(function () {
    JQTab = {};
    var my = JQTab;
    my.init = function (options, callback) {
        var options = $.extend({
            target: "body",
            id: "myjqtabs_1",
            Tabs: [{ title: "Tab1", Content: "Tab1", isShow: true }, { id: "tab2", title: "Tab2", Content: "Tab2", isShow: false}]
        }, options);

        my.createTabs(options, function () {
            if (callback) callback();
        });
    };
    my.createTabs = function (options, callback) {
        var s = [];
        s.push('<div class="tabContainer" id="' + options.id + '" style="' + (options.style ? options.style : '') + '"><ul class="title">');
        for (var i = 0; i < options.Tabs.length; i++) {
            s.push('<li><a clickOnly="' + (options.Tabs[i].clickOnly ? 'true' : 'false') + '" ' + (options.Tabs[i].clickurl ? ' href="' + options.Tabs[i].clickurl + '" target="_blank"' : '')  + (options.Tabs[i].isShow ? ' class="ON"' : '') + ' optioni="' + i + '">' + options.Tabs[i].title + '</a></li>');
        }
        s.push('    </ul>');
        for (var i = 0; i < options.Tabs.length; i++) {
            s.push('<ul class="cntul ' + (options.Tabs[i].cssName ? options.Tabs[i].cssName : "") + '" style="display:' + (options.Tabs[i].isShow ? "block" : "none") + ';' + options.Tabs[i].style + '" id="JQTab_content_' + i + '">' + (options.Tabs[i].isShow ? ((typeof options.Tabs[i].Content === 'string') ? options.Tabs[i].Content : options.Tabs[i].Content()) : "") + '</ul>');
        }
        s.push('</div>');
        $(options.target).html(s.join(''));

        $('#' + options.id + ' .title li a').click(function () {
            if ($(this).attr('clickOnly') == 'false') {
                if ($(this).attr('class') !== 'ON') {
                    $(this).addClass('ON').parent('li').siblings().find('.ON').removeClass('ON');
                    var num = parseInt($(this).attr('optioni'));

                    var obj = $(this).closest('ul').siblings('#JQTab_content_' + num + '');
                    if ($(obj).html() === '') {
                        if (typeof options.Tabs[num].Content == 'string')
                            $(obj).html(options.Tabs[num].Content);
                        else
                            options.Tabs[num].Content($(obj), num);
                    }
                    $(obj).fadeIn(200).siblings('ul[id^=JQTab_content_]').hide();
                }
            } else {
                var num = parseInt($(this).attr('optioni'));
                var obj = $(this).closest('ul').siblings('#JQTab_content_' + num + '');
                if (options.Tabs[num].clickEvent) options.Tabs[num].clickEvent(obj);
            }
        });

        $('#' + options.id + ' .title li').css({ width: function () { return $(this).find('a').width() + 25; } });

        if (callback) callback();
    };

})();