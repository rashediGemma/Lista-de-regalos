! function() {
    if (isWindows = -1 < navigator.platform.indexOf("Win"), isWindows) {
        if (0 != jQuery(".sidebar").length) new PerfectScrollbar(".sidebar");
        if (0 != jQuery(".sidebar-wrapper").length) new PerfectScrollbar(".sidebar-wrapper");
        if (0 != jQuery(".main-panel").length) new PerfectScrollbar(".main-panel");
        if (0 != jQuery(".main").length) new PerfectScrollbar("main");
        jQuery("html").addClass("perfect-scrollbar-on")
    } else jQuery("html").addClass("perfect-scrollbar-off")
}();
var breakCards = !0,
    searchVisible = 0,
    transparent = !0,
    transparentDemo = !0,
    fixedTop = !1,
    mobile_menu_visible = 0,
    mobile_menu_initialized = !1,
    toggle_initialized = !1,
    bootstrap_nav_initialized = !1,
    seq = 0,
    delays = 80,
    durations = 500,
    seq2 = 0,
    delays2 = 80,
    durations2 = 500;

function debounce(t, n, i) {
    var r;
    return function() {
        var e = this,
            a = arguments;
        clearTimeout(r), r = setTimeout(function() {
            r = null, i || t.apply(e, a)
        }, n), i && !r && t.apply(e, a)
    }
}
jQuery(document).ready(function() {
    jQuerysidebar = jQuery(".sidebar"), window_width = jQuery(window).width(), jQuery("body").bootstrapMaterialDesign({
        autofill: !1
    }), md.initSidebarsCheck(), window_width = jQuery(window).width(), md.checkSidebarImage(), md.initMinimizeSidebar(), jQuery(".dropdown-menu a.dropdown-toggle").on("click", function(e) {
        var a = jQuery(this),
            t = jQuery(this).offsetParent(".dropdown-menu");
        return jQuery(this).next().hasClass("show") || jQuery(this).parents(".dropdown-menu").first().find(".show").removeClass("show"), jQuery(this).next(".dropdown-menu").toggleClass("show"), jQuery(this).closest("a").toggleClass("open"), jQuery(this).parents("a.dropdown-item.dropdown.show").on("hidden.bs.dropdown", function(e) {
            jQuery(".dropdown-menu .show").removeClass("show")
        }), t.parent().hasClass("navbar-nav") || a.next().css({
            top: a[0].offsetTop,
            left: t.outerWidth() - 4
        }), !1
    }), 0 != jQuery(".selectpicker").length && jQuery(".selectpicker").selectpicker(), jQuery('[rel="tooltip"]').tooltip(), jQuery('[data-toggle="popover"]').popover();
    var e = jQuery(".tagsinput").data("color");
    0 != jQuery(".tagsinput").length && jQuery(".tagsinput").tagsinput(), jQuery(".bootstrap-tagsinput").addClass(e + "-badge"), jQuery(".select").dropdown({
        dropdownClass: "dropdown-menu",
        optionClass: ""
    }), jQuery(".form-control").on("focus", function() {
        jQuery(this).parent(".input-group").addClass("input-group-focus")
    }).on("blur", function() {
        jQuery(this).parent(".input-group").removeClass("input-group-focus")
    }), 1 == breakCards && jQuery('[data-header-animation="true"]').each(function() {
        jQuery(this);
        var a = jQuery(this).parent(".card");
        a.find(".fix-broken-card").click(function() {
            console.log(this);
            var e = jQuery(this).parent().parent().siblings(".card-header, .card-header-image");
            e.removeClass("hinge").addClass("fadeInDown"), a.attr("data-count", 0), setTimeout(function() {
                e.removeClass("fadeInDown animate")
            }, 480)
        }), a.mouseenter(function() {
            var e = jQuery(this);
            hover_count = parseInt(e.attr("data-count"), 10) + 1 || 0, e.attr("data-count", hover_count), 20 <= hover_count && jQuery(this).children(".card-header, .card-header-image").addClass("hinge animated")
        })
    }), jQuery('input[type="checkbox"][required="true"], input[type="radio"][required="true"]').on("click", function() {
        jQuery(this).hasClass("error") && jQuery(this).closest("div").removeClass("has-error")
    })
}), jQuery(document).on("click", ".navbar-toggler", function() {
    if (jQuerytoggle = jQuery(this), 1 == mobile_menu_visible) jQuery("html").removeClass("nav-open"), jQuery(".close-layer").remove(), setTimeout(function() {
        jQuerytoggle.removeClass("toggled")
    }, 400), mobile_menu_visible = 0;
    else {
        setTimeout(function() {
            jQuerytoggle.addClass("toggled")
        }, 430);
        var e = jQuery('<div class="close-layer"></div>');
        0 != jQuery("body").find(".main-panel").length ? e.appendTo(".main-panel") : jQuery("body").hasClass("off-canvas-sidebar") && e.appendTo(".wrapper-full-page"), setTimeout(function() {
            e.addClass("visible")
        }, 100), e.click(function() {
            jQuery("html").removeClass("nav-open"), mobile_menu_visible = 0, e.removeClass("visible"), setTimeout(function() {
                e.remove(), jQuerytoggle.removeClass("toggled")
            }, 400)
        }), jQuery("html").addClass("nav-open"), mobile_menu_visible = 1
    }
}), jQuery(window).resize(function() {
    md.initSidebarsCheck(), seq = seq2 = 0, setTimeout(function() {
        md.initDashboardPageCharts()
    }, 500)
}), md = {
    misc: {
        navbar_menu_visible: 0,
        active_collapse: !0,
        disabled_collapse_init: 0
    },
    checkSidebarImage: function() {
        jQuerysidebar = jQuery(".sidebar"), image_src = jQuerysidebar.data("image"), void 0 !== image_src && (sidebar_container = '<div class="sidebar-background" style="background-image: url(' + image_src + ') "/>', jQuerysidebar.append(sidebar_container))
    },
    showNotification: function(e, a) {
        type = ["", "info", "danger", "success", "warning", "rose", "primary"], color = Math.floor(6 * Math.random() + 1), jQuery.notify({
            icon: "add_alert",
            message: "Welcome to <b>Material Dashboard Pro</b> - a beautiful admin panel for every web developer."
        }, {
            type: type[color],
            timer: 3e3,
            placement: {
                from: e,
                align: a
            }
        })
    },
    initDocumentationCharts: function() {
        if (0 != jQuery("#dailySalesChart").length && 0 != jQuery("#websiteViewsChart").length) {
            dataDailySalesChart = {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                series: [
                    [12, 17, 7, 17, 23, 18, 38]
                ]
            }, optionsDailySalesChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                high: 50,
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            };
            new Chartist.Line("#dailySalesChart", dataDailySalesChart, optionsDailySalesChart), new Chartist.Line("#websiteViewsChart", dataDailySalesChart, optionsDailySalesChart)
        }
    },
    initFormExtendedDatetimepickers: function() {
        jQuery(".datetimepicker").datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: "fa fa-chevron-left",
                next: "fa fa-chevron-right",
                today: "fa fa-screenshot",
                clear: "fa fa-trash",
                close: "fa fa-remove"
            }
        }), jQuery(".datepicker").datetimepicker({
            format: "DD/MM/YYYY",
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: "fa fa-chevron-left",
                next: "fa fa-chevron-right",
                today: "fa fa-screenshot",
                clear: "fa fa-trash",
                close: "fa fa-remove"
            }
        }), jQuery(".timepicker").datetimepicker({
            format: "h:mm A",
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: "fa fa-chevron-left",
                next: "fa fa-chevron-right",
                today: "fa fa-screenshot",
                clear: "fa fa-trash",
                close: "fa fa-remove"
            }
        })
    },
    initSliders: function() {
        var e = document.getElementById("sliderRegular");
        noUiSlider.create(e, {
            start: 40,
            connect: [!0, !1],
            range: {
                min: 0,
                max: 100
            }
        });
        var a = document.getElementById("sliderDouble");
        noUiSlider.create(a, {
            start: [20, 60],
            connect: !0,
            range: {
                min: 0,
                max: 100
            }
        })
    },
    initSidebarsCheck: function() {
        //jQuery(window).width() <= 991 && 0 != jQuerysidebar.length && md.initRightMenu()
    },
    checkFullPageBackgroundImage: function() {
        jQuerypage = jQuery(".full-page"), image_src = jQuerypage.data("image"), void 0 !== image_src && (image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>', jQuerypage.append(image_container))
    },
    initDashboardPageCharts: function() {
        if (0 != jQuery("#dailySalesChart").length || 0 != jQuery("#completedTasksChart").length || 0 != jQuery("#websiteViewsChart").length) {
            dataDailySalesChart = {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                series: [
                    [12, 17, 7, 17, 23, 18, 38]
                ]
            }, optionsDailySalesChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                high: 50,
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            };
            var e = new Chartist.Line("#dailySalesChart", dataDailySalesChart, optionsDailySalesChart);
            md.startAnimationForLineChart(e), dataCompletedTasksChart = {
                labels: ["12p", "3p", "6p", "9p", "12p", "3a", "6a", "9a"],
                series: [
                    [230, 750, 450, 300, 280, 240, 200, 190]
                ]
            }, optionsCompletedTasksChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                high: 1e3,
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            };
            var a = new Chartist.Line("#completedTasksChart", dataCompletedTasksChart, optionsCompletedTasksChart);
            md.startAnimationForLineChart(a);
            var t = Chartist.Bar("#websiteViewsChart", {
                labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
                series: [
                    [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]
                ]
            }, {
                axisX: {
                    showGrid: !1
                },
                low: 0,
                high: 1e3,
                chartPadding: {
                    top: 0,
                    right: 5,
                    bottom: 0,
                    left: 0
                }
            }, [
                ["screen and (max-width: 640px)", {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function(e) {
                            return e[0]
                        }
                    }
                }]
            ]);
            md.startAnimationForBarChart(t)
        }
    },
    initMinimizeSidebar: function() {
        jQuery("#minimizeSidebar").click(function() {
            jQuery(this);
            1 == md.misc.sidebar_mini_active ? (jQuery("body").removeClass("sidebar-mini"), md.misc.sidebar_mini_active = !1) : (jQuery("body").addClass("sidebar-mini"), md.misc.sidebar_mini_active = !0);
            var e = setInterval(function() {
                window.dispatchEvent(new Event("resize"))
            }, 180);
            setTimeout(function() {
                clearInterval(e)
            }, 1e3)
        })
    },
    checkScrollForTransparentNavbar: debounce(function() {
        260 < jQuery(document).scrollTop() ? transparent && (transparent = !1, jQuery(".navbar-color-on-scroll").removeClass("navbar-transparent")) : transparent || (transparent = !0, jQuery(".navbar-color-on-scroll").addClass("navbar-transparent"))
    }, 17),
    initRightMenu: debounce(function() {
        jQuerysidebar_wrapper = jQuery(".sidebar-wrapper"), mobile_menu_initialized ? 991 < jQuery(window).width() && (jQuerysidebar_wrapper.find(".navbar-form").remove(), jQuerysidebar_wrapper.find(".nav-mobile-menu").remove(), mobile_menu_initialized = !1) : (jQuerynavbar = jQuery("nav").find(".navbar-collapse").children(".navbar-nav"), mobile_menu_content = "", nav_content = jQuerynavbar.html(), nav_content = '<ul class="nav navbar-nav nav-mobile-menu">' + nav_content + "</ul>", navbar_form = jQuery("nav").find(".navbar-form").get(0).outerHTML, jQuerysidebar_nav = jQuerysidebar_wrapper.find(" > .nav"), jQuerynav_content = jQuery(nav_content), jQuerynavbar_form = jQuery(navbar_form), jQuerynav_content.insertBefore(jQuerysidebar_nav), jQuerynavbar_form.insertBefore(jQuerynav_content), jQuery(".sidebar-wrapper .dropdown .dropdown-menu > li > a").click(function(e) {
            e.stopPropagation()
        }), window.dispatchEvent(new Event("resize")), mobile_menu_initialized = !0)
    }, 200),
    startAnimationForLineChart: function(e) {
        e.on("draw", function(e) {
            "line" === e.type || "area" === e.type ? e.element.animate({
                d: {
                    begin: 600,
                    dur: 700,
                    from: e.path.clone().scale(1, 0).translate(0, e.chartRect.height()).stringify(),
                    to: e.path.clone().stringify(),
                    easing: Chartist.Svg.Easing.easeOutQuint
                }
            }) : "point" === e.type && (seq++, e.element.animate({
                opacity: {
                    begin: seq * delays,
                    dur: durations,
                    from: 0,
                    to: 1,
                    easing: "ease"
                }
            }))
        }), seq = 0
    },
    startAnimationForBarChart: function(e) {
        e.on("draw", function(e) {
            "bar" === e.type && (seq2++, e.element.animate({
                opacity: {
                    begin: seq2 * delays2,
                    dur: durations2,
                    from: 0,
                    to: 1,
                    easing: "ease"
                }
            }))
        }), seq2 = 0
    },
    initFullCalendar: function() {
        jQuerycalendar = jQuery("#fullCalendar"), today = new Date, y = today.getFullYear(), m = today.getMonth(), d = today.getDate(), jQuerycalendar.fullCalendar({
            viewRender: function(e, a) {
                "month" != e.name && jQuery(a).find(".fc-scroller").perfectScrollbar()
            },
            header: {
                left: "title",
                center: "month,agendaWeek,agendaDay",
                right: "prev,next,today"
            },
            defaultDate: today,
            selectable: !0,
            selectHelper: !0,
            views: {
                month: {
                    titleFormat: "MMMM YYYY"
                },
                week: {
                    titleFormat: " MMMM D YYYY"
                },
                day: {
                    titleFormat: "D MMM, YYYY"
                }
            },
            select: function(t, n) {
                swal({
                    title: "Create an Event",
                    html: '<div class="form-group"><input class="form-control" placeholder="Event Title" id="input-field"></div>',
                    showCancelButton: !0,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                    buttonsStyling: !1
                }).then(function(e) {
                    var a;
                    event_title = jQuery("#input-field").val(), event_title && (a = {
                        title: event_title,
                        start: t,
                        end: n
                    }, jQuerycalendar.fullCalendar("renderEvent", a, !0)), jQuerycalendar.fullCalendar("unselect")
                }).catch(swal.noop)
            },
            editable: !0,
            eventLimit: !0,
            events: [{
                title: "All Day Event",
                start: new Date(y, m, 1),
                className: "event-default"
            }, {
                id: 999,
                title: "Repeating Event",
                start: new Date(y, m, d - 4, 6, 0),
                allDay: !1,
                className: "event-rose"
            }, {
                id: 999,
                title: "Repeating Event",
                start: new Date(y, m, d + 3, 6, 0),
                allDay: !1,
                className: "event-rose"
            }, {
                title: "Meeting",
                start: new Date(y, m, d - 1, 10, 30),
                allDay: !1,
                className: "event-green"
            }, {
                title: "Lunch",
                start: new Date(y, m, d + 7, 12, 0),
                end: new Date(y, m, d + 7, 14, 0),
                allDay: !1,
                className: "event-red"
            }, {
                title: "Md-pro Launch",
                start: new Date(y, m, d - 2, 12, 0),
                allDay: !0,
                className: "event-azure"
            }, {
                title: "Birthday Party",
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: !1,
                className: "event-azure"
            }, {
                title: "Click for Creative Tim",
                start: new Date(y, m, 21),
                end: new Date(y, m, 22),
                url: "http://www.creative-tim.com/",
                className: "event-orange"
            }, {
                title: "Click for Google",
                start: new Date(y, m, 21),
                end: new Date(y, m, 22),
                url: "http://www.creative-tim.com/",
                className: "event-orange"
            }]
        })
    },
    initVectorMap: function() {
        jQuery("#worldMap").vectorMap({
            map: "world_mill_en",
            backgroundColor: "transparent",
            zoomOnScroll: !1,
            regionStyle: {
                initial: {
                    fill: "#e4e4e4",
                    "fill-opacity": .9,
                    stroke: "none",
                    "stroke-width": 0,
                    "stroke-opacity": 0
                }
            },
            series: {
                regions: [{
                    values: {
                        AU: 760,
                        BR: 550,
                        CA: 120,
                        DE: 1300,
                        FR: 540,
                        GB: 690,
                        GE: 200,
                        IN: 200,
                        RO: 600,
                        RU: 300,
                        US: 2920
                    },
                    scale: ["#AAAAAA", "#444444"],
                    normalizeFunction: "polynomial"
                }]
            }
        })
    }
};
