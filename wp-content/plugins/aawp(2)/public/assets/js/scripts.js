!function(factory) {
    var registeredInModuleLoader = !1;
    if ("function" == typeof define && define.amd && (define(factory), registeredInModuleLoader = !0), 
    "object" == typeof exports && (module.exports = factory(), registeredInModuleLoader = !0), 
    !registeredInModuleLoader) {
        var OldCookies = window.Cookies, api = window.Cookies = factory();
        api.noConflict = function() {
            return window.Cookies = OldCookies, api;
        };
    }
}(function() {
    function extend() {
        for (var i = 0, result = {}; i < arguments.length; i++) {
            var attributes = arguments[i];
            for (var key in attributes) result[key] = attributes[key];
        }
        return result;
    }
    function init(converter) {
        function api(key, value, attributes) {
            var result;
            if ("undefined" != typeof document) {
                if (arguments.length > 1) {
                    if (attributes = extend({
                        path: "/"
                    }, api.defaults, attributes), "number" == typeof attributes.expires) {
                        var expires = new Date();
                        expires.setMilliseconds(expires.getMilliseconds() + 864e5 * attributes.expires), 
                        attributes.expires = expires;
                    }
                    attributes.expires = attributes.expires ? attributes.expires.toUTCString() : "";
                    try {
                        result = JSON.stringify(value), /^[\{\[]/.test(result) && (value = result);
                    } catch (e) {}
                    value = converter.write ? converter.write(value, key) : encodeURIComponent(String(value)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent), 
                    key = encodeURIComponent(String(key)), key = key.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent), 
                    key = key.replace(/[\(\)]/g, escape);
                    var stringifiedAttributes = "";
                    for (var attributeName in attributes) attributes[attributeName] && (stringifiedAttributes += "; " + attributeName, 
                    attributes[attributeName] !== !0 && (stringifiedAttributes += "=" + attributes[attributeName]));
                    return document.cookie = key + "=" + value + stringifiedAttributes;
                }
                key || (result = {});
                for (var cookies = document.cookie ? document.cookie.split("; ") : [], rdecode = /(%[0-9A-Z]{2})+/g, i = 0; i < cookies.length; i++) {
                    var parts = cookies[i].split("="), cookie = parts.slice(1).join("=");
                    '"' === cookie.charAt(0) && (cookie = cookie.slice(1, -1));
                    try {
                        var name = parts[0].replace(rdecode, decodeURIComponent);
                        if (cookie = converter.read ? converter.read(cookie, name) : converter(cookie, name) || cookie.replace(rdecode, decodeURIComponent), 
                        this.json) try {
                            cookie = JSON.parse(cookie);
                        } catch (e) {}
                        if (key === name) {
                            result = cookie;
                            break;
                        }
                        key || (result[name] = cookie);
                    } catch (e) {}
                }
                return result;
            }
        }
        return api.set = api, api.get = function(key) {
            return api.call(api, key);
        }, api.getJSON = function() {
            return api.apply({
                json: !0
            }, [].slice.call(arguments));
        }, api.defaults = {}, api.remove = function(key, attributes) {
            api(key, "", extend(attributes, {
                expires: -1
            }));
        }, api.withConverter = init, api;
    }
    return init(function() {});
}), jQuery(document).ready(function($) {}), jQuery(document).ready(function($) {
    $('[data-aawp-click-tracking="true"] a, a[data-aawp-click-tracking="true"]').on("click", function(e) {
        var link = $(this);
        if ("undefined" == typeof link.data("aawp-prevent-click-tracking")) {
            var container = $(this).attr("data-aawp-click-tracking") ? $(this) : $(this).closest('[data-aawp-click-tracking="true"]'), label = !1;
            if ("undefined" != typeof container.data("aawp-product-id") && (label = container.data("aawp-product-id")), 
            "undefined" != typeof container.data("aawp-product-title") && (label = container.data("aawp-product-title")), 
            label) {
                var category = "amazon-link", action = "click";
                "function" == typeof gtag ? gtag("event", action, {
                    event_category: category,
                    event_label: label
                }) : "undefined" != typeof ga ? ga("send", "event", category, action, label) : "undefined" != typeof _gaq ? _gaq.push([ "_trackEvent", category, action, label ]) : "undefined" != typeof __gaTracker ? __gaTracker("send", "event", category, action, label) : "undefined" != typeof _paq ? _paq.push([ "trackEvent", category, action, label ]) : "undefined" != typeof dataLayer && dataLayer.push({
                    event: "amazon-affiliate-link-click",
                    category: category,
                    action: action,
                    label: label
                });
            }
        }
    });
}), jQuery(document).ready(function($) {
    function handleGeotargeting() {
        userCountry = userCountry.toLowerCase(), localizedStores.hasOwnProperty(userCountry) && (storeTarget = localizedStores[userCountry], 
        storeTarget === storeCountry && debugMode === !1 || trackingIds.hasOwnProperty(storeTarget) && (localTrackingId = trackingIds[storeTarget], 
        update_amazon_links(storeCountry, storeTarget, localTrackingId)));
    }
    function getCountry() {
        "geoip-db" === api ? getCountryFromApiGeoipdb() : "ipinfo" === api ? getCountryFromApiIpinfo() : "ipdata" === api ? getCountryFromApiIpdata() : getCountryFromApiGeoipdb();
    }
    function getCountryFromApiGeoipdb() {
        var requestUrl = "https://geoip-db.com/jsonp";
        devIP && (requestUrl = "https://geoip-db.com/jsonp/" + devIP), jQuery.ajax({
            url: requestUrl,
            jsonpCallback: "callback",
            dataType: "jsonp",
            success: function(response) {
                "undefined" != typeof response.IPv4 && "undefined" != typeof response.country_code && (userCountry = response.country_code, 
                setGeotargetingCookie(userCountry)), handleGeotargeting();
            }
        });
    }
    function getCountryFromApiIpdata() {
        var requestUrl = "https://api.ipdata.co/";
        devIP && (requestUrl = "https://api.ipdata.co/" + devIP), jQuery.ajax({
            url: requestUrl,
            jsonpCallback: "callback",
            dataType: "jsonp",
            success: function(response) {
                "undefined" != typeof response.ip && "undefined" != typeof response.country_code && (userCountry = response.country_code, 
                setGeotargetingCookie(userCountry)), handleGeotargeting();
            }
        });
    }
    function getCountryFromApiIpinfo() {
        var requestUrl = "https://ipinfo.io/json/";
        devIP && (requestUrl = "https://ipinfo.io/" + devIP + "/json/"), jQuery.ajax({
            url: requestUrl,
            jsonpCallback: "callback",
            dataType: "jsonp",
            success: function(response) {
                "undefined" != typeof response.ip && "undefined" != typeof response.country && (userCountry = response.country, 
                setGeotargetingCookie(userCountry)), handleGeotargeting();
            }
        });
    }
    function update_amazon_links(storeOld, storeNew, trackingId) {
        null !== trackingId && $("a[href*='/amazon'], a[href*='/www.amazon'], a[href*='/amzn'], a[href*='/www.amzn']").each(function(el) {
            var url = $(this).attr("href");
            "asin" === urlMode || url.indexOf("prime") != -1 ? url = get_url_mode_asin(url, storeOld, storeNew) : "title" === urlMode && (url = get_url_mode_title($(this), url, storeOld, storeNew)), 
            url = replaceUrlParam(url, "tag", trackingId), $(this).attr("href", url);
        });
    }
    function get_url_mode_title(linkElement, url, storeOld, storeNew) {
        var productTitle = linkElement.data("aawp-product-title");
        return productTitle || (productTitle = linkElement.parents().filter(function() {
            return $(this).data("aawp-product-title");
        }).eq(0).data("aawp-product-title")), productTitle && (productTitle = getWords(productTitle, 5), 
        url = "https://www.amazon." + storeNew + "/s/?field-keywords=" + encodeURIComponent(productTitle)), 
        url;
    }
    function get_url_mode_asin(url, storeOld, storeNew) {
        var urlTypeShort = !1, urlTypeLong = !1;
        if (url.indexOf("amzn." + storeCountry) != -1 && (urlTypeShort = !0), url.indexOf("amazon." + storeCountry) != -1 && (urlTypeLong = !0), 
        (urlTypeShort || urlTypeLong) && url.indexOf("tag=") != -1) return url = "com" == storeOld && urlTypeShort ? url.replace("amzn." + storeOld, "amazon." + storeNew + "/dp") : "com" == storeNew ? url.replace("amazon." + storeOld, "amzn." + storeNew) : url.replace("amazon." + storeOld, "amazon." + storeNew);
    }
    function replaceUrlParam(url, paramName, paramValue) {
        null == paramValue && (paramValue = "");
        var pattern = new RegExp("\\b(" + paramName + "=).*?(&|$)");
        return url.search(pattern) >= 0 ? url.replace(pattern, "$1" + paramValue + "$2") : url + (url.indexOf("?") > 0 ? "&" : "?") + paramName + "=" + paramValue;
    }
    function getWords(str, max) {
        return str.split(/\s+/).slice(0, max).join(" ");
    }
    function setGeotargetingCookie(countryCode) {
        debugMode || countryCode && AAWPCookies.set("aawp-geotargeting", countryCode);
    }
    function isGeotargetingDebugMode() {
        var vars = {};
        return window.location.href.replace(location.hash, "").replace(/[?&]+([^=&]+)=?([^&]*)?/gi, function(m, key, value) {
            vars[key] = void 0 !== value ? value : "";
        }), !!vars.aawp_debug_geotargeting;
    }
    if ("undefined" != typeof aawp_geotargeting_settings && "undefined" != typeof aawp_geotargeting_localized_stores && "undefined" != typeof aawp_geotargeting_tracking_ids) {
        var devIP = "", debugMode = isGeotargetingDebugMode(), api = "undefined" != typeof aawp_geotargeting_api ? aawp_geotargeting_api : "", settings = aawp_geotargeting_settings, localizedStores = aawp_geotargeting_localized_stores, trackingIds = aawp_geotargeting_tracking_ids;
        if (!settings.hasOwnProperty("store")) return;
        var urlMode = settings.hasOwnProperty("mode") ? settings.mode : "mode", storeCountry = settings.store, storeTarget = "", userCountry = "", localTrackingId = "", AAWPCookies = Cookies.noConflict(), geotargetingCookie = AAWPCookies.get("aawp-geotargeting");
        void 0 !== geotargetingCookie && debugMode === !1 ? (userCountry = geotargetingCookie, 
        handleGeotargeting()) : getCountry();
    }
});