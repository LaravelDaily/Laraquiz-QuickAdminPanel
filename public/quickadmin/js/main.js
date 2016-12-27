$(document).ready(function () {

    var activeSub = $(document).find('.active-sub');
    if (activeSub.length > 0) {
        activeSub.parent().show();
        activeSub.parent().parent().find('.arrow').addClass('open');
        activeSub.parent().parent().addClass('open');
    }

    $('.datatable').each(function() {
        var options = {
            retrieve: true,
            dom: 'frtip<"actions">',
            columnDefs: [],
            "iDisplayLength": 100,
            "aaSorting": []
        };

        if ($(this).hasClass('dt-select')) {
            options.select = {
                style: 'multi',
                selector: 'td:first-child'
            };

            options.columnDefs.push({
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            });
        }

        $(this).dataTable(options);
    });

    if (typeof window.route_mass_crud_entries_destroy != 'undefined') {
        $('.datatable').siblings('.actions').html('<a href="' + window.route_mass_crud_entries_destroy + '" class="btn btn-xs btn-danger js-delete-selected" onclick="return confirm(\'Are you sure\');" style="margin-top:0.755em;margin-left: 20px;">Delete selected</a>');
    }

    $(document).on('click', '.js-delete-selected', function() {
        var ids = [];

        $(this).closest('.actions').siblings('.datatable').find('tbody tr.selected').each(function() {
            ids.push($(this).data('entry-id'));
        });

        $.ajax({
            method: 'POST',
            url: $(this).attr('href'),
            data: {
                _token: _token,
                ids: ids
            }
        }).done(function() {
            location.reload();
        });

        return false;
    });

    $(document).on('click', '.datatable #select-all', function() {
        var selected = $(this).is(':checked');

        $(this).closest('table.datatable').find('td:first-child').each(function() {
            if (selected != $(this).closest('tr').hasClass('selected')) {
                $(this).click();
            }
        });
    });

    $('.mass').click(function () {
        if ($(this).is(":checked")) {
            $('.single').each(function () {
                if ($(this).is(":checked") == false) {
                    $(this).click();
                }
            });
        } else {
            $('.single').each(function () {
                if ($(this).is(":checked") == true) {
                    $(this).click();
                }
            });
        }
    });

    $('.page-sidebar').on('click', 'li > a', function (e) {

        if ($('body').hasClass('page-sidebar-closed') && $(this).parent('li').parent('.page-sidebar-menu').size() === 1) {
            return;
        }

        var hasSubMenu = $(this).next().hasClass('sub-menu');

        if ($(this).next().hasClass('sub-menu always-open')) {
            return;
        }

        var parent = $(this).parent().parent();
        var the = $(this);
        var menu = $('.page-sidebar-menu');
        var sub = $(this).next();

        var autoScroll = menu.data("auto-scroll");
        var slideSpeed = parseInt(menu.data("slide-speed"));
        var keepExpand = menu.data("keep-expanded");

        if (keepExpand !== true) {
            parent.children('li.open').children('a').children('.arrow').removeClass('open');
            parent.children('li.open').children('.sub-menu:not(.always-open)').slideUp(slideSpeed);
            parent.children('li.open').removeClass('open');
        }

        var slideOffeset = -200;

        if (sub.is(":visible")) {
            $('.arrow', $(this)).removeClass("open");
            $(this).parent().removeClass("open");
            sub.slideUp(slideSpeed, function () {
                if (autoScroll === true && $('body').hasClass('page-sidebar-closed') === false) {
                    if ($('body').hasClass('page-sidebar-fixed')) {
                        menu.slimScroll({
                            'scrollTo': (the.position()).top
                        });
                    }
                }
            });
        } else if (hasSubMenu) {
            $('.arrow', $(this)).addClass("open");
            $(this).parent().addClass("open");
            sub.slideDown(slideSpeed, function () {
                if (autoScroll === true && $('body').hasClass('page-sidebar-closed') === false) {
                    if ($('body').hasClass('page-sidebar-fixed')) {
                        menu.slimScroll({
                            'scrollTo': (the.position()).top
                        });
                    }
                }
            });
        }
        if (hasSubMenu == true || $(this).attr('href') == '#') {
            e.preventDefault();
        }
    });

});