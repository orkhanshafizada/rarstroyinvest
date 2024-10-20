!function () {
    function e() {
        var e = document.querySelector("body"), o = document.querySelector("#header");
        (o.classList.contains("scroll-up-sticky") || o.classList.contains("sticky-top") || o.classList.contains("fixed-top")) && (100 < window.scrollY ? e.classList.add("scrolled") : e.classList.remove("scrolled"))
    }

    document.addEventListener("scroll", e), window.addEventListener("load", e);
    let o = document.querySelector(".menu-btn");

    function t() {
        document.querySelector("body").classList.toggle("mobile-nav-active"), document.querySelector("body").classList.toggle("h-100"), o.classList.toggle("open")
    }

    o.addEventListener("click", t), document.querySelectorAll("#navmenu a").forEach(e => {
        e.addEventListener("click", () => {
            document.querySelector(".menu-btn") && t()
        })
    }), document.querySelectorAll(".navmenu .toggle-dropdown").forEach(e => {
        e.addEventListener("click", function (e) {
            e.preventDefault(), this.parentNode.classList.toggle("active"), this.parentNode.nextElementSibling.classList.toggle("dropdown-active"), e.stopImmediatePropagation()
        })
    }), window.addEventListener("load", function () {
        AOS.init({duration: 600, easing: "ease-in-out", once: !0, mirror: !1})
    })
}();
let dropdowns = document.querySelectorAll(".dropdown");

function addMenuOpenClass(e) {
    e = e.querySelector(".dropdown-toggle");
    e && e.classList.add("menu__open")
}

function removeMenuOpenClass(e) {
    e = e.querySelector(".dropdown-toggle");
    e && e.classList.remove("menu__open")
}

dropdowns.forEach(o => {
    var e = o.querySelector(".dropdown-toggle"), t = o.querySelectorAll(".submenu__item");
    e && e.addEventListener("mouseover", () => {
        console.log("Hover over dropdown toggle"), addMenuOpenClass(o)
    }), t.forEach(e => {
        e.addEventListener("mouseover", () => {
            console.log("Hover over submenu link"), addMenuOpenClass(o)
        }), e.addEventListener("mouseout", () => {
            console.log("Mouseout from submenu link"), removeMenuOpenClass(o)
        })
    }), o.addEventListener("mouseleave", () => {
        console.log("Mouseleave from dropdown"), removeMenuOpenClass(o)
    })
});
var s, minInput, maxInput, l = document.getElementById("priceRange");
l && (noUiSlider.create(l, {
    connect: !0,
    behaviour: "tap",
    start: [minPrice, maxPrice],
    range: {min: [minPrice], max: [maxPrice]}
}), s = document.getElementById("priceRange-value"), minInput = s.querySelector(".min"), maxInput = s.querySelector(".max"), l.noUiSlider.on("update", function (e) {
    minInput.value = e[0], maxInput.value = e[1]
})), $(document).ready(function () {
    $('[data-fancybox="gallery2"]').fancybox({helpers: {overlay: {locked: !1}}}), $('[data-fancybox="gallery"]').fancybox({
        loop: !0,
        afterShow: function (e, o) {
            o = o.index;
            $(".main-slide").slick("slickGoTo", o)
        }
    })
});
let tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]'),
    tooltipList = [...tooltipTriggerList].map(e => new bootstrap.Tooltip(e));
document.addEventListener("DOMContentLoaded", function () {
    let e = document.querySelectorAll(".option__tab"), n = document.querySelectorAll(".option__pane"),
        l = document.querySelectorAll(".btn__option"), o = document.querySelectorAll(".option__price"),
        s = document.querySelectorAll(".option__name");

    function t(t) {
        e.forEach((e, o) => {
            o === t ? (e.classList.add("active"), e.classList.add("active"), e.setAttribute("aria-selected", "true"), e.removeAttribute("tabindex"), n[o].classList.add("show", "active"), console.log(l[o]), console.log(e), console.log(n[o])) : (e.classList.remove("active"), e.setAttribute("aria-selected", "false"), e.setAttribute("tabindex", "-1"), n[o].classList.remove("show", "active"))
        }), l.forEach((e, o) => {
            o === t ? e.classList.add("active") : e.classList.remove("active")
        }), o.forEach((e, o) => {
            o === t ? e.classList.add("show") : e.classList.remove("show")
        }), s.forEach((e, o) => {
            o === t ? e.classList.add("show") : e.classList.remove("show")
        })
    }

    l.forEach((e, o) => {
        e.addEventListener("click", e => {
            e.preventDefault(), t(o)
        })
    }), e.forEach((e, o) => {
        e.addEventListener("click", () => {
            t(o)
        })
    })
});
