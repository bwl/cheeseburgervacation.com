var stringJsonUrl = '<?php echo base_url(); ?>json/strings.json';
var itemJsonUrl = '<?php echo base_url(); ?>json/items.json';
var achievementsJsonUrl = '<?php echo base_url(); ?>json/achievements.json';
var peopleJsonUrl = '/json/people.json';
var statusJsonUrl = '/assets/serverstatus/status.json';
var moneysJsonUrl = '/assets/serverstatus/moneys.json';
//var apiUrl = '//api.wurstmineberg.de/';
var apiUrl = 'cheeseburgervacation.com:8080';

function Person (person_data) {
    // Properties set themselves when instantiated
    this.id = person_data['id'];
    this.description = person_data['description'];
    this.irc = person_data['irc'];
    this.minecraft = person_data['minecraft'];
    this.reddit = person_data['reddit'];
    this.show_inventory = 'show_inventory' in person_data ? person_data['show_inventory'] : false;
    this.status = 'status' in person_data ? person_data['status'] : 'later';
    this.twitter = person_data['twitter'];
    this.website = person_data['website'];
    this.wiki = person_data['wiki'];
    this.fav_item = person_data['fav_item'];
    this.ava = '/assets/img/ava/' + this.minecraft + '.png';

    this.interfaceName = function() {
        if ('name' in person_data) {
            return person_data['name'];
        } else if ('id' in person_data) {
            return person_data['id'];
        } else if ('minecraft' in person_data) {
            return person_data['minecraft'];
        };
    }();
}

function People (people_data) {
    this.list = function() {
        return _.map(people_data, function(value) {
            return new Person(value);
        });
    }();

    this.activePeople = function(id) {
        return this.list.filter(function(person) {
            return (person.status != 'former');
        });
    };

    this.count = this.list.length;

    this.personById = function(id) {
        return _.find(this.list, function(person) {
            return 'id' in person && person['id'] === id;
        });
    };

    this.personByMinecraft = function(id) {
        return _.find(this.list, function(person) {
            return 'minecraft' in person && person['minecraft'] === id;
        });
    };
}

var API = {
    ajaxJSONDeferred: function(url) {
        return $.ajax(url, {
            type: 'GET',
            dataType: 'json'
        }).then(function(ajaxData) {
            // Strips out all the extra data we don't need
            return ajaxData;
        });
    },

    serverStatus: function() {
        return API.ajaxJSONDeferred(statusJsonUrl);
    },

    stringData: function() {
        return API.ajaxJSONDeferred(stringJsonUrl);
    },

    itemData: function() {
        return API.ajaxJSONDeferred(itemJsonUrl);
    },

    achievementData: function() {
        return API.ajaxJSONDeferred(achievementsJsonUrl);
    },

    peopleData: function() {
        return API.ajaxJSONDeferred(peopleJsonUrl);
    },

    people: function() {
        return API.peopleData().then(function(people_data) {
            return new People(people_data);
        });
    },

    personById: function(player_id) {
        return API.ajaxJSONDeferred(apiUrl + '/player/' + player_id + '/info.json')
            .then(function(person_data) {
                return new Person(person_data);
            });
    },

    statData: function() {
        return API.ajaxJSONDeferred(apiUrl + '/server/playerstats/general.json');
    },

    person: function(player) {
        return API.personById(player.id)
    },
    
    playerData: function(person) {
        if (person.minecraft) {
            return API.ajaxJSONDeferred(apiUrl + '/player/' + person.minecraft + '/playerdata.json');
        }
    },
    
    personStatData: function(person) {
        if (person.minecraft) {
            return API.ajaxJSONDeferred(apiUrl + '/player/' + person.minecraft + '/stats.json');
        };
    },

    moneys: function() {
        return API.ajaxJSONDeferred(moneysJsonUrl);
    }
}


function bind_tab_events() {
    $('.tab-item').bind('click', function(eventObject) {
        eventObject.preventDefault();
        $(this).tab('show');
    });

    $('.tab-item').on('show.bs.tab', function(e) {
        var id = $(this).attr('id')
        var elementid = id.substring('tab-'.length, id.length);
        var selected = $('#' + elementid);
        $('.stats-section').each(function(index, element) {
            var table = $(element);
            if (table.attr('id') == selected.attr('id')) {
                table.removeClass("hidden");
            } else {
                table.addClass("hidden");
            }
        });
    });

    if (location.hash !== '') $('a[href="' + location.hash + '"]').tab('show');
        return $('a.tab-item').on('shown.bs.tab', function(e) {
            return location.hash = $(e.target).attr('href').substr(1);
    });
}

function select_tab_with_id(id) {
    $('#' + id).tab('show');
}

function url_domain(data) {
    var a = document.createElement('a');
    a.href = data;
    return a.hostname;
}

function reddit_user_link(username) {
    return 'https://reddit.com/u/' + username;
}

function twitter_user_link(username) {
    return 'https://twitter.com/' + username;
}

function wiki_user_link(username) {
    username = username.replace(/ /g, '_');
    return 'http://wiki.wurstmineberg.de/User:' + username;
}

function initialize_tooltips() {
    $(function () {
        $("[rel='tooltip']").tooltip();
    });
}

// Some string functions to ease the parsing of substrings
String.prototype.startsWith = function(needle)
{
    return(this.indexOf(needle) == 0);
};

String.prototype.endsWith = function(suffix) {
    return this.indexOf(suffix, this.length - suffix.length) !== -1;
};

function linkify_headers() {
    // Do the stuff to the headers to linkify them

    $.each($('h2'), function() {
        $(this).addClass("anchor");
        $(this).append('&nbsp;<a class="tag" href="#' + $(this).attr('id') + '">�</a>');
    });
    $('h2').hover(function() {
        $(this).children('.tag').css('display', 'inline');
    }, function() {
        $(this).children('.tag').css('display', 'none');
    });
}

function configure_navigation() {
    var navigation_items = $("#navbar-list > li");
    var windowpath = window.location.pathname;

    // Iterate over the list items and change the container of the active nav item to active
    $.each(navigation_items, function() {
        var elementlink = $(this).children($("a"))[0];
        var elementpath = elementlink.getAttribute("href");
        if (elementpath === windowpath) {
            $(this).addClass("active");
        }
    });
}

function set_anchor_height() {
    var navigation_height = $(".navbar").css("height");
    var anchor = $(".anchor");

    anchor.css("padding-top", "+=" + navigation_height);
    anchor.css("margin-top", "-=" + navigation_height);
}

function minecraft_ticks_to_real_minutes(minecraft_minutes) {
    return minecraft_minutes / 1200;
}

function prettify_stats_value(key, value) {
    var final_value = value;

    if (key.endsWith('OneCm')) {
        if (value > 100000) {
            final_value = (value / 100000).toFixed(2) + 'km';
        } else if (value > 100) {
            final_value = (value / 100).toFixed(2) + 'm';
        } else {
            final_value = value + 'cm';
        }
    } else if (key.endsWith('OneMinute')) {
        var minutes = Math.floor(minecraft_ticks_to_real_minutes(value));
        var hours = 0;
        var days = 0;

        if (minutes >= 60) {
            hours = Math.floor(minutes / 60);
            minutes = minutes % 60;
        }

        if (hours >= 24) {
            days = Math.floor(hours / 60);
            hours = hours % 24;
        }

        final_value = '';
        if (days) {
            final_value += days + 'd ';
        }
        if (hours) {
            final_value += hours + 'h ';
        }
        if (minutes) {
            final_value += minutes + 'min '
        }
    } else if (key.startsWith('damage')) {
        final_value = (value / 2) + ' hearts';
    }

    return final_value;
}

function minecraft_nick_to_username(minecraft, people) {
    var playername;
    $.each(people, function(index, values) {
        if (['minecraft'] in values) {
            if (minecraft === values['minecraft']) {
                if ('name' in values) {
                    playername = values['name'];
                } else {
                    playername = values['id'];
                }
                return;
            };
        };
    });

    return playername;
}

function username_for_player_values(values) {
    if ('name' in values) {
        return values['name'];
    }

    return values['id'];
}

function username_to_minecraft_nick(username, people) {
    var minecraftname;

    $.each(people, function(index, values) {
        var name = username_for_player_values(values)
        if (name === username) {
            if ('minecraft' in values) {
                minecraftname = values['minecraft'];
            }
        }
    });

    return minecraftname;
}

function html_player_list(people) {
    var html = '';

    $.each(people, function(index, person) {
        if (index >= 1) {
            html += ', ';
        };

        html += '<span class="player-avatar-name"><img src="' + person.ava + '" class="avatar" /><a class="player" href="/people/' + person.id + '">' + person.interfaceName + '</a></span>';
    });

    return html;
};

function getServerStatus(on,version) {
    if (on) {
        var versionString = version == null ? "(error)" : ('<a href="http://minecraft.gamepedia.com/Version_history' + ((version.indexOf('pre') != 1 || version.substring(2,3) == 'w') ? '/Development_versions#' : '#') + version + '" style="font-weight: bold;">' + version + '</a>');
        $('#serverinfo').html('The server is currently <strong>online</strong> and running on version ' + versionString + ', and <span id="peopleCount">(loading) of the (loading) whitelisted players are</span> currently active.<br /><span id="peopleList"></span>');
    } else {
        $('#serverinfo').html("The server is <strong>offline</strong> right now. For more information, consult the <a href='http://twitter.com/wurstmineberg'>Twitter account</a>.");
    }
};

function getOnlineData(list) {
    $.when(API.people())
        .done(function(people) {
            if (list.length == 1) {
                $('#peopleCount').html('one of the <span id="whitelistCount">(loading)</span> whitelisted players is');
            } else if (list.length == 0) {
                $('#peopleCount').html('none of the <span id="whitelistCount">(loading)</span> whitelisted players are');
            } else {
                $('#peopleCount').html(list.length + ' of the <span id="whitelistCount">(loading)</span> whitelisted players are');
            }

            $('#whitelistCount').html(people.activePeople().length);

            onlinePeople = list.map(function(minecraftName) {
                return people.personByMinecraft(minecraftName);
            });

            $('#peopleList').html(html_player_list(onlinePeople));
    })
        .fail(function() {
            $('#whitelistCount').text('(error)');
        });
};


// Run by default
linkify_headers();
configure_navigation();
set_anchor_height();
$(".use-tooltip").tooltip();
$("abbr").tooltip();