! function i(a, c, u) {
    function d(t, e) {
        if (!c[t]) {
            if (!a[t]) {
                var n = "function" == typeof require && require;
                if (!e && n) return n(t, !0);
                if (l) return l(t, !0);
                var r = new Error("Cannot find module '" + t + "'");
                throw r.code = "MODULE_NOT_FOUND", r
            }
            var o = c[t] = {
                exports: {}
            };
            a[t][0].call(o.exports, function(e) {
                return d(a[t][1][e] || e)
            }, o, o.exports, i, a, c, u)
        }
        return c[t].exports
    }
    for (var l = "function" == typeof require && require, e = 0; e < u.length; e++) d(u[e]);
    return d
}({
    1: [function(e, t, n) {
        var r = e("dragula");
        ! function() {
            this.jKanban = function() {
                var b = this;
                this._disallowedItemProperties = ["id", "title", "click", "drag", "dragend", "drop", "order"], this.element = "", this.container = "", this.boardContainer = [], this.dragula = r, this.drake = "", this.drakeBoard = "", this.addItemButton = !1;
                this.buttonContent = "+";

                function y(e) {
                    e.addEventListener("click", function(e) {
                        e.preventDefault(), b.options.click(this), "function" == typeof this.clickfn && this.clickfn(this)
                    })
                }

                function w(e, t) {
                    e.addEventListener("click", function(e) {
                        e.preventDefault(), b.options.buttonClick(this, t)
                    })
                }

                function i(t) {
                    var n = [];
                    return b.options.boards.map(function(e) {
                        if (e.id === t) return n.push(e)
                    }), n[0]
                }

                function E(e, t) {
                    for (var n in t) - 1 < b._disallowedItemProperties.indexOf(n) || e.setAttribute("data-" + n, t[n])
                }
                arguments[0] && "object" == typeof arguments[0] && (this.options = function(e, t) {
                    var n;
                    for (n in t) t.hasOwnProperty(n) && (e[n] = t[n]);
                    return e
                }({
                    element: "",
                    gutter: "15px",
                    widthBoard: "250px",
                    responsive: "700",
                    responsivePercentage: !(this.buttonContent = "+"),
                    boards: [],
                    dragBoards: !0,
                    dragItems: !0,
                    addItemButton: !1,
                    buttonContent: "+",
                    dragEl: function(e, t) {},
                    dragendEl: function(e) {},
                    dropEl: function(e, t, n, r) {},
                    dragBoard: function(e, t) {},
                    dragendBoard: function(e) {},
                    dropBoard: function(e, t, n, r) {},
                    click: function(e) {},
                    buttonClick: function(e, t) {}
                }, arguments[0])), this.init = function() {
                    ! function() {
                        b.element = document.querySelector(b.options.element);
                        var e = document.createElement("div");
                        e.classList.add("kanban-container"), b.container = e, b.addBoards(b.options.boards, !0), b.element.appendChild(b.container)
                    }(), window.innerWidth > b.options.responsive && (b.drakeBoard = b.dragula([b.container], {
                        moves: function(e, t, n, r) {
                            return !!b.options.dragBoards && (n.classList.contains("kanban-board-header") || n.classList.contains("kanban-title-board"))
                        },
                        accepts: function(e, t, n, r) {
                            return t.classList.contains("kanban-container")
                        },
                        revertOnSpill: !0,
                        direction: "horizontal"
                    }).on("drag", function(e, t) {
                        e.classList.add("is-moving"), b.options.dragBoard(e, t), "function" == typeof e.dragfn && e.dragfn(e, t)


                    }).on("dragend", function(e) {
                        ! function() {
                            for (var e = 1, t = 0; t < b.container.childNodes.length; t++) b.container.childNodes[t].dataset.order = e++
                        }(), e.classList.remove("is-moving"), b.options.dragendBoard(e), "function" == typeof e.dragendfn && e.dragendfn(e)



                    }).on("drop", function(e, t, n, r) {
                        e.classList.remove("is-moving"), b.options.dropBoard(e, t, n, r), "function" == typeof e.dropfn && e.dropfn(e, t, n, r);
                        //   Custom Edit
                        // var elements = $(t + ' .kanban-board');
                        var elements = t.childNodes;
                        var orders = [];
                        elements.forEach(function (ele, index) {
                            var elementData = {
                                id: ele.getAttribute('data-id'),
                                order: ++index
                            }
                            orders.push(elementData);
                        });
                        console.log(orders);
                        $.ajax({
                            type: "get",
                            url: "question_orders",
                            data: {orders: orders},
                            beforeSend: function(){
                                $('#kanban4').hide();

                                $('#uploadStatus').html('<img src="http://mujib-chatbot.com/cdn/bot.gif" style=""/>');
                            },
                            success: function (response) {
                                $('#kanban4').show();
                                $('#uploadStatus').html('')
                            }
                        });


                    }), b.drake = b.dragula(b.boardContainer, {
                        moves: function(e, t, n, r) {
                            return !!b.options.dragItems
                        },
                        revertOnSpill: !0
                    }).on("cancel", function(e, t, n) {
                        b.enableAllBoards()
                    }).on("drag", function(e, t) {
                        var n = e.getAttribute("class");
                        if ("" !== n && -1 < n.indexOf("not-draggable")) b.drake.cancel(!0);
                        else {
                            e.classList.add("is-moving");
                            var r = i(t.parentNode.dataset.id);
                            void 0 !== r.dragTo && b.options.boards.map(function(e) {
                                -1 === r.dragTo.indexOf(e.id) && e.id !== t.parentNode.dataset.id && b.findBoard(e.id).classList.add("disabled-board")
                            }), b.options.dragEl(e, t), null !== e && "function" == typeof e.dragfn && e.dragfn(e, t)
                        }
                    }).on("dragend", function(e) {
                        b.options.dragendEl(e), null !== e && "function" == typeof e.dragendfn && e.dragendfn(e)
                        // Edit 4 change data order and parent id
                        var currparentID = e.parentNode.getAttribute('data-board-id');
                        var oldParentId = e.getAttribute('data-parent-id');
                        console.log('draged', oldParentId, currparentID);

                        // Data order for tasks
                        var currBoardEle = e.parentNode.childNodes;

                        currBoardEle.forEach(function (currEle, index) {
                            var boardElements = {
                                boardId: currparentID,
                                taskId: currEle.getAttribute('data-task-id'),
                                taskOrder: ++index,
                                content: currEle.textContent
                            }
                            console.log(boardElements);

                        });


                    }).on("drop", function(e, t, n, r) {
                        b.enableAllBoards();
                        var o = i(n.parentNode.dataset.id);
                        void 0 !== o.dragTo && -1 === o.dragTo.indexOf(t.parentNode.dataset.id) && t.parentNode.dataset.id !== n.parentNode.dataset.id && b.drake.cancel(!0), null !== e && (!1 === b.options.dropEl(e, t, n, r) && b.drake.cancel(!0), e.classList.remove("is-moving"), "function" == typeof e.dropfn && e.dropfn(e, t, n, r))
                    }))
                }, this.enableAllBoards = function() {
                    var e = document.querySelectorAll(".kanban-board");
                    if (0 < e.length && void 0 !== e)
                        for (var t = 0; t < e.length; t++) e[t].classList.remove("disabled-board")
                }, this.addElement = function(e, t) {
                    var n = b.element.querySelector('[data-id="' + e + '"] .kanban-drag'),
                        r = document.createElement("div");
                    return r.classList.add("kanban-item"), console.log(t), void 0 !== t.id && "" !== t.id && r.setAttribute("data-eid", t.id), r.innerHTML = t.title, r.clickfn = t.click, r.dragfn = t.drag, r.dragendfn = t.dragend, r.dropfn = t.drop, E(r, t), y(r), n.appendChild(r), b
                }, this.addForm = function(e, t) {
                    var n = b.element.querySelector('[data-id="' + e + '"] .kanban-drag'),
                        r = t.getAttribute("class");
                    return t.setAttribute("class", r + " not-draggable"), n.appendChild(t), b
                }, this.addBoards = function(e, t) {
                    if (b.options.responsivePercentage)
                        if (b.container.style.width = "100%", b.options.gutter = "1%", window.innerWidth > b.options.responsive) var n = (100 - 2 * e.length) / e.length;
                        else n = 100 - 2 * e.length;
                    else n = b.options.widthBoard;
                    var r = b.options.addItemButton,
                        o = b.options.buttonContent;

                    for (var i in e) {
                        var a = e[i];
                        t || b.options.boards.push(a), b.options.responsivePercentage || ("" === b.container.style.width ? b.container.style.width = parseInt(n) + 2 * parseInt(b.options.gutter) + "px" : b.container.style.width = parseInt(b.container.style.width) + parseInt(n) + 2 * parseInt(b.options.gutter) + "px");
                        var c = document.createElement("div");
                        c.dataset.id = a.id, c.dataset.order = b.container.childNodes.length + 1, c.classList.add("kanban-board"), b.options.responsivePercentage ? c.style.width = n + "%" : c.style.width = n, c.style.marginLeft = b.options.gutter, c.style.marginRight = b.options.gutter;
                        var isText = 'choice',
                            val = document.getElementById("questionType").value;
                        if(val){isText = val}
                        var u = document.createElement("header");
                        if ("" !== a.class && void 0 !== a.class) var d = a.class.split(",");
                        else d = [];
                        if (u.classList.add("kanban-board-header"), d.map(function (e) {
                            u.classList.add(e)
                        }), u.innerHTML = `<div class="kanban-title-board" style="overflow: hidden"> ${a.title} </div> <div class="un-dragapple-ele ">
                          <i class="flaticon2-contract edit-curr-question mx-1" data-id="${e[i].id}"></i>
                          <i class="flaticon-circle delete-icon-question mx-1" data-id="${e[i].id}" data-toggle="modal" data-target="#kt_modal_remove_question"></i>
                          <i class="flaticon-add add-newe-qu mx-1" data-id="${e[i].id}" data-type="${isText}"></i>
                          </div>`, r) {
                            /* *************************>> Edited <<********************* */

                            var l = document.createElement("BUTTON"),
                                s = document.createTextNode(o);
                            l.setAttribute("class", "kanban-title-button btn btn-default btn-xs"), l.appendChild(s), u.appendChild(l), w(l, a.id)
                        }
                        var f = document.createElement("main");
                        if (f.classList.add("kanban-drag"), f.setAttribute('data-board-id', e[i].id), "" !== a.bodyClass && void 0 !== a.bodyClass) var p = a.bodyClass.split(",");
                        //   Edit 3 set data- parent to tasks container

                        else p = [];
                        for (var v in p.map(function(e) {
                            f.classList.add(e)
                        }), b.boardContainer.push(f), a.item) {
                            var m = a.item[v],
                                g = document.createElement("div");
                            g.classList.add("kanban-item"), g.setAttribute("data-parent-id", e[i].id), g.setAttribute("data-task-id", Math.floor(Math.random() * 10900 + new Date().getSeconds())), g.setAttribute("data-task-order", ++v), m.id && (g.dataset.eid = m.id), g.innerHTML = m.title, g.clickfn = m.click, g.dragfn = m.drag, g.dragendfn = m.dragend, g.dropfn = m.drop, E(g, m), y(g), f.appendChild(g)
                        }
                        //   Edit 1 in Tasks Set id and order to every task

                        var h = document.createElement("footer");
                        c.appendChild(u), c.appendChild(f), c.appendChild(h), b.container.appendChild(c)
                    }
                    return b
                }, this.findBoard = function(e) {
                    return b.element.querySelector('[data-id="' + e + '"]')
                }, this.getParentBoardID = function(e) {
                    return "string" == typeof e && (e = b.element.querySelector('[data-eid="' + e + '"]')), null === e ? null : e.parentNode.parentNode.dataset.id
                }, this.moveElement = function(e, t, n) {
                    if (e !== this.getParentBoardID(t)) return this.removeElement(t), this.addElement(e, n)
                }, this.replaceElement = function(e, t) {
                    var n = e;
                    return "string" == typeof n && (n = b.element.querySelector('[data-eid="' + e + '"]')), n.innerHTML = t.title, n.clickfn = t.click, n.dragfn = t.drag, n.dragendfn = t.dragend, n.dropfn = t.drop, E(n, t), b
                }, this.findElement = function(e) {
                    return b.element.querySelector('[data-eid="' + e + '"]')
                }, this.getBoardElements = function(e) {
                    return b.element.querySelector('[data-id="' + e + '"] .kanban-drag').childNodes
                }, this.removeElement = function(e) {
                    return "string" == typeof e && (e = b.element.querySelector('[data-eid="' + e + '"]')), null !== e && e.remove(), b
                }, this.removeBoard = function(e) {
                    return "string" == typeof e && (e = b.element.querySelector('[data-id="' + e + '"]')), null !== e && e.remove(), b
                }, this.onButtonClick = function(e) {}, this.init()
            }
        }()
    }, {
        dragula: 9
    }],
    2: [function(e, t, n) {
        t.exports = function(e, t) {
            return Array.prototype.slice.call(e, t)
        }
    }, {}],
    3: [function(e, t, n) {
        "use strict";
        var r = e("ticky");
        t.exports = function(e, t, n) {
            e && r(function() {
                e.apply(n || null, t || [])
            })
        }
    }, {
        ticky: 11
    }],
    4: [function(e, t, n) {
        "use strict";
        var c = e("atoa"),
            u = e("./debounce");
        t.exports = function(o, e) {
            var i = e || {},
                a = {};
            return void 0 === o && (o = {}), o.on = function(e, t) {
                return a[e] ? a[e].push(t) : a[e] = [t], o
            }, o.once = function(e, t) {
                return t._once = !0, o.on(e, t), o
            }, o.off = function(e, t) {
                var n = arguments.length;
                if (1 === n) delete a[e];
                else if (0 === n) a = {};
                else {
                    var r = a[e];
                    if (!r) return o;
                    r.splice(r.indexOf(t), 1)
                }
                return o
            }, o.emit = function() {
                var e = c(arguments);
                return o.emitterSnapshot(e.shift()).apply(this, e)
            }, o.emitterSnapshot = function(r) {
                var e = (a[r] || []).slice(0);
                return function() {
                    var t = c(arguments),
                        n = this || o;
                    if ("error" === r && !1 !== i.throws && !e.length) throw 1 === t.length ? t[0] : t;
                    return e.forEach(function(e) {
                        i.async ? u(e, t, n) : e.apply(n, t), e._once && o.off(r, e)
                    }), o
                }
            }, o
        }
    }, {
        "./debounce": 3,
        atoa: 2
    }],
    5: [function(n, r, e) {
        (function(o) {
            "use strict";
            var i = n("custom-event"),
                a = n("./eventmap"),
                c = o.document,
                e = function(e, t, n, r) {
                    return e.addEventListener(t, n, r)
                },
                t = function(e, t, n, r) {
                    return e.removeEventListener(t, n, r)
                },
                u = [];

            function d(e, t, n) {
                var r = function(e, t, n) {
                    var r, o;
                    for (r = 0; r < u.length; r++)
                        if ((o = u[r]).element === e && o.type === t && o.fn === n) return r
                }(e, t, n);
                if (r) {
                    var o = u[r].wrapper;
                    return u.splice(r, 1), o
                }
            }
            o.addEventListener || (e = function(e, t, n) {
                return e.attachEvent("on" + t, function(e, t, n) {
                    var r = d(e, t, n) || function(n, e, r) {
                        return function(e) {
                            var t = e || o.event;
                            t.target = t.target || t.srcElement, t.preventDefault = t.preventDefault || function() {
                                t.returnValue = !1
                            }, t.stopPropagation = t.stopPropagation || function() {
                                t.cancelBubble = !0
                            }, t.which = t.which || t.keyCode, r.call(n, t)
                        }
                    }(e, 0, n);
                    return u.push({
                        wrapper: r,
                        element: e,
                        type: t,
                        fn: n
                    }), r
                }(e, t, n))
            }, t = function(e, t, n) {
                var r = d(e, t, n);
                if (r) return e.detachEvent("on" + t, r)
            }), r.exports = {
                add: e,
                remove: t,
                fabricate: function(e, t, n) {
                    var r = -1 === a.indexOf(t) ? new i(t, {
                        detail: n
                    }) : function() {
                        var e;
                        c.createEvent ? (e = c.createEvent("Event")).initEvent(t, !0, !0) : c.createEventObject && (e = c.createEventObject());
                        return e
                    }();
                    e.dispatchEvent ? e.dispatchEvent(r) : e.fireEvent("on" + t, r)
                }
            }
        }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
    }, {
        "./eventmap": 6,
        "custom-event": 7
    }],
    6: [function(e, o, t) {
        (function(e) {
            "use strict";
            var t = [],
                n = "",
                r = /^on/;
            for (n in e) r.test(n) && t.push(n.slice(2));
            o.exports = t
        }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
    }, {}],
    7: [function(e, n, t) {
        (function(e) {
            var t = e.CustomEvent;
            n.exports = function() {
                try {
                    var e = new t("cat", {
                        detail: {
                            foo: "bar"
                        }
                    });
                    return "cat" === e.type && "bar" === e.detail.foo
                } catch (e) {}
                return !1
            }() ? t : "function" == typeof document.createEvent ? function(e, t) {
                var n = document.createEvent("CustomEvent");
                return t ? n.initCustomEvent(e, t.bubbles, t.cancelable, t.detail) : n.initCustomEvent(e, !1, !1, void 0), n
            } : function(e, t) {
                var n = document.createEventObject();
                return n.type = e, t ? (n.bubbles = Boolean(t.bubbles), n.cancelable = Boolean(t.cancelable), n.detail = t.detail) : (n.bubbles = !1, n.cancelable = !1, n.detail = void 0), n
            }
        }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
    }, {}],
    8: [function(e, t, n) {
        "use strict";
        var r = {},
            o = "(?:^|\\s)",
            i = "(?:\\s|$)";

        function a(e) {
            var t = r[e];
            return t ? t.lastIndex = 0 : r[e] = t = new RegExp(o + e + i, "g"), t
        }
        t.exports = {
            add: function(e, t) {
                var n = e.className;
                n.length ? a(t).test(n) || (e.className += " " + t) : e.className = t
            },
            rm: function(e, t) {
                e.className = e.className.replace(a(t), " ").trim()
            }
        }
    }, {}],
    9: [function(e, t, n) {
        (function(o) {
            "use strict";
            var M = e("contra/emitter"),
                Y = e("crossvent"),
                j = e("./classes"),
                F = document,
                R = F.documentElement;

            function H(e, t, n, r) {
                o.navigator.pointerEnabled ? Y[t](e, {
                    mouseup: "pointerup",
                    mousedown: "pointerdown",
                    mousemove: "pointermove"
                }[n], r) : o.navigator.msPointerEnabled ? Y[t](e, {
                    mouseup: "MSPointerUp",
                    mousedown: "MSPointerDown",
                    mousemove: "MSPointerMove"
                }[n], r) : (Y[t](e, {
                    mouseup: "touchend",
                    mousedown: "touchstart",
                    mousemove: "touchmove"
                }[n], r), Y[t](e, n, r))
            }

            function U(e) {
                if (void 0 !== e.touches) return e.touches.length;
                if (void 0 !== e.which && 0 !== e.which) return e.which;
                if (void 0 !== e.buttons) return e.buttons;
                var t = e.button;
                return void 0 !== t ? 1 & t ? 1 : 2 & t ? 3 : 4 & t ? 2 : 0 : void 0
            }

            function K(e, t) {
                return void 0 !== o[t] ? o[t] : R.clientHeight ? R[e] : F.body[e]
            }

            function z(e, t, n) {
                var r, o = e || {},
                    i = o.className;
                return o.className += " gu-hide", r = F.elementFromPoint(t, n), o.className = i, r
            }

            function W() {
                return !1
            }

            function V() {
                return !0
            }

            function $(e) {
                return e.width || e.right - e.left
            }

            function G(e) {
                return e.height || e.bottom - e.top
            }

            function J(e) {
                return e.parentNode === F ? null : e.parentNode
            }

            function Q(e) {
                return "INPUT" === e.tagName || "TEXTAREA" === e.tagName || "SELECT" === e.tagName || function e(t) {
                    if (!t) return !1;
                    if ("false" === t.contentEditable) return !1;
                    if ("true" === t.contentEditable) return !0;
                    return e(J(t))
                }(e)
            }

            function Z(t) {
                return t.nextElementSibling || function() {
                    var e = t;
                    for (; e = e.nextSibling, e && 1 !== e.nodeType;);
                    return e
                }()
            }

            function ee(e, t) {
                var n = function(e) {
                        return e.targetTouches && e.targetTouches.length ? e.targetTouches[0] : e.changedTouches && e.changedTouches.length ? e.changedTouches[0] : e
                    }(t),
                    r = {
                        pageX: "clientX",
                        pageY: "clientY"
                    };
                return e in r && !(e in n) && r[e] in n && (e = r[e]), n[e]
            }
            t.exports = function(e, t) {
                var p, v, m, g, h, i, a, b, y, w, n;
                1 === arguments.length && !1 === Array.isArray(e) && (t = e, e = []);
                var c, E = null,
                    T = t || {};
                void 0 === T.moves && (T.moves = V), void 0 === T.accepts && (T.accepts = V), void 0 === T.invalid && (T.invalid = function() {
                    return !1
                }), void 0 === T.containers && (T.containers = e || []), void 0 === T.isContainer && (T.isContainer = W), void 0 === T.copy && (T.copy = !1), void 0 === T.copySortSource && (T.copySortSource = !1), void 0 === T.revertOnSpill && (T.revertOnSpill = !1), void 0 === T.removeOnSpill && (T.removeOnSpill = !1), void 0 === T.direction && (T.direction = "vertical"), void 0 === T.ignoreInputTextSelection && (T.ignoreInputTextSelection = !0), void 0 === T.mirrorContainer && (T.mirrorContainer = F.body);
                var C = M({
                    containers: T.containers,
                    start: function(e) {
                        var t = k(e);
                        t && S(t)
                    },
                    end: x,
                    cancel: O,
                    remove: N,
                    destroy: function() {
                        r(!0), L({})
                    },
                    canMove: function(e) {
                        return !!k(e)
                    },
                    dragging: !1
                });
                return !0 === T.removeOnSpill && C.on("over", function(e) {
                    j.rm(e, "gu-hide")
                }).on("out", function(e) {
                    C.dragging && j.add(e, "gu-hide")
                }), r(), C;

                function u(e) {
                    return -1 !== C.containers.indexOf(e) || T.isContainer(e)
                }

                function r(e) {
                    var t = e ? "remove" : "add";
                    H(R, t, "mousedown", s), H(R, t, "mouseup", L)
                }

                function d(e) {
                    H(R, e ? "remove" : "add", "mousemove", f)
                }

                function l(e) {
                    var t = e ? "remove" : "add";
                    Y[t](R, "selectstart", o), Y[t](R, "click", o)
                }

                function o(e) {
                    c && e.preventDefault()
                }

                function s(e) {
                    if (i = e.clientX, a = e.clientY, !(1 !== U(e) || e.metaKey || e.ctrlKey)) {
                        var t = e.target,
                            n = k(t);
                        n && (c = n, d(), "mousedown" === e.type && (Q(t) ? t.focus() : e.preventDefault()))
                    }
                }

                function f(e) {
                    if (c)
                        if (0 !== U(e)) {
                            if (void 0 === e.clientX || e.clientX !== i || void 0 === e.clientY || e.clientY !== a) {
                                if (T.ignoreInputTextSelection) {
                                    var t = ee("clientX", e),
                                        n = ee("clientY", e);
                                    if (Q(F.elementFromPoint(t, n))) return
                                }
                                var r = c;
                                d(!0), l(), x(), S(r);
                                var o = function(e) {
                                    var t = e.getBoundingClientRect();
                                    return {
                                        left: t.left + K("scrollLeft", "pageXOffset"),
                                        top: t.top + K("scrollTop", "pageYOffset")
                                    }
                                }(m);
                                g = ee("pageX", e) - o.left, h = ee("pageY", e) - o.top, j.add(w || m, "gu-transit"),
                                    function() {
                                        if (p) return;
                                        var e = m.getBoundingClientRect();
                                        (p = m.cloneNode(!0)).style.width = $(e) + "px", p.style.height = G(e) + "px", j.rm(p, "gu-transit"), j.add(p, "gu-mirror"), T.mirrorContainer.appendChild(p), H(R, "add", "mousemove", q), j.add(T.mirrorContainer, "gu-unselectable"), C.emit("cloned", p, m, "mirror")
                                    }(), q(e)
                            }
                        } else L({})
                }

                function k(e) {
                    if (!(C.dragging && p || u(e))) {
                        for (var t = e; J(e) && !1 === u(J(e));) {
                            if (T.invalid(e, t)) return;
                            if (!(e = J(e))) return
                        }
                        var n = J(e);
                        if (n)
                            if (!T.invalid(e, t))
                                if (T.moves(e, n, t, Z(e))) return {
                                    item: e,
                                    source: n
                                }
                    }
                }

                function S(e) {
                    ! function(e, t) {
                        return "boolean" == typeof T.copy ? T.copy : T.copy(e, t)
                    }(e.item, e.source) || (w = e.item.cloneNode(!0), C.emit("cloned", w, e.item, "copy")), v = e.source, m = e.item, b = y = Z(e.item), C.dragging = !0, C.emit("drag", m, v)
                }

                function x() {
                    if (C.dragging) {
                        var e = w || m;
                        I(e, J(e))
                    }
                }

                function B() {
                    d(!(c = !1)), l(!0)
                }

                function L(e) {
                    if (B(), C.dragging) {
                        var t = w || m,
                            n = ee("clientX", e),
                            r = ee("clientY", e),
                            o = P(z(p, n, r), n, r);
                        o && (w && T.copySortSource || !w || o !== v) ? I(t, o) : T.removeOnSpill ? N() : O()
                    }
                }

                function I(e, t) {
                    var n = J(e);
                    w && T.copySortSource && t === v && n.removeChild(m), A(t) ? C.emit("cancel", e, v, v) : C.emit("drop", e, t, v, y), _()
                }

                function N() {
                    if (C.dragging) {
                        var e = w || m,
                            t = J(e);
                        t && t.removeChild(e), C.emit(w ? "cancel" : "remove", e, t, v), _()
                    }
                }

                function O(e) {
                    if (C.dragging) {
                        var t = 0 < arguments.length ? e : T.revertOnSpill,
                            n = w || m,
                            r = J(n),
                            o = A(r);
                        !1 === o && t && (w ? r && r.removeChild(w) : v.insertBefore(n, b)), o || t ? C.emit("cancel", n, v, v) : C.emit("drop", n, r, v, y), _()
                    }
                }

                function _() {
                    var e = w || m;
                    B(), p && (j.rm(T.mirrorContainer, "gu-unselectable"), H(R, "remove", "mousemove", q), J(p).removeChild(p), p = null), e && j.rm(e, "gu-transit"), n && clearTimeout(n), C.dragging = !1, E && C.emit("out", e, E, v), C.emit("dragend", e), v = m = w = b = y = n = E = null
                }

                function A(e, t) {
                    var n;
                    return n = void 0 !== t ? t : p ? y : Z(w || m), e === v && n === b
                }

                function P(n, r, o) {
                    for (var i = n; i && !e();) i = J(i);
                    return i;

                    function e() {
                        if (!1 === u(i)) return !1;
                        var e = D(i, n),
                            t = X(i, e, r, o);
                        return !!A(i, t) || T.accepts(m, i, v, t)
                    }
                }

                function q(e) {
                    if (p) {
                        e.preventDefault();
                        var t = ee("clientX", e),
                            n = ee("clientY", e),
                            r = t - g,
                            o = n - h;
                        p.style.left = r + "px", p.style.top = o + "px";
                        var i = w || m,
                            a = z(p, t, n),
                            c = P(a, t, n),
                            u = null !== c && c !== E;
                        !u && null !== c || (E && f("out"), E = c, u && f("over"));
                        var d = J(i);
                        if (c !== v || !w || T.copySortSource) {
                            var l, s = D(c, a);
                            if (null !== s) l = X(c, s, t, n);
                            else {
                                if (!0 !== T.revertOnSpill || w) return void(w && d && d.removeChild(i));
                                l = b, c = v
                            }(null === l && u || l !== i && l !== Z(i)) && (y = l, c.insertBefore(i, l), C.emit("shadow", i, c, v))
                        } else d && d.removeChild(i)
                    }

                    function f(e) {
                        C.emit(e, i, E, v)
                    }
                }

                function D(e, t) {
                    for (var n = t; n !== e && J(n) !== e;) n = J(n);
                    return n === R ? null : n
                }

                function X(o, t, i, a) {
                    var c = "horizontal" === T.direction;
                    return t !== o ? function() {
                        var e = t.getBoundingClientRect();
                        if (c) return n(i > e.left + $(e) / 2);
                        return n(a > e.top + G(e) / 2)
                    }() : function() {
                        var e, t, n, r = o.children.length;
                        for (e = 0; e < r; e++) {
                            if (t = o.children[e], n = t.getBoundingClientRect(), c && n.left + n.width / 2 > i) return t;
                            if (!c && n.top + n.height / 2 > a) return t
                        }
                        return null
                    }();

                    function n(e) {
                        return e ? Z(t) : t
                    }
                }
            }
        }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
    }, {
        "./classes": 8,
        "contra/emitter": 4,
        crossvent: 5
    }],
    10: [function(e, t, n) {
        var r, o, i = t.exports = {};

        function a() {
            throw new Error("setTimeout has not been defined")
        }

        function c() {
            throw new Error("clearTimeout has not been defined")
        }

        function u(t) {
            if (r === setTimeout) return setTimeout(t, 0);
            if ((r === a || !r) && setTimeout) return r = setTimeout, setTimeout(t, 0);
            try {
                return r(t, 0)
            } catch (e) {
                try {
                    return r.call(null, t, 0)
                } catch (e) {
                    return r.call(this, t, 0)
                }
            }
        }! function() {
            try {
                r = "function" == typeof setTimeout ? setTimeout : a
            } catch (e) {
                r = a
            }
            try {
                o = "function" == typeof clearTimeout ? clearTimeout : c
            } catch (e) {
                o = c
            }
        }();
        var d, l = [],
            s = !1,
            f = -1;

        function p() {
            s && d && (s = !1, d.length ? l = d.concat(l) : f = -1, l.length && v())
        }

        function v() {
            if (!s) {
                var e = u(p);
                s = !0;
                for (var t = l.length; t;) {
                    for (d = l, l = []; ++f < t;) d && d[f].run();
                    f = -1, t = l.length
                }
                d = null, s = !1,
                    function(t) {
                        if (o === clearTimeout) return clearTimeout(t);
                        if ((o === c || !o) && clearTimeout) return o = clearTimeout, clearTimeout(t);
                        try {
                            o(t)
                        } catch (e) {
                            try {
                                return o.call(null, t)
                            } catch (e) {
                                return o.call(this, t)
                            }
                        }
                    }(e)
            }
        }

        function m(e, t) {
            this.fun = e, this.array = t
        }

        function g() {}
        i.nextTick = function(e) {
            var t = new Array(arguments.length - 1);
            if (1 < arguments.length)
                for (var n = 1; n < arguments.length; n++) t[n - 1] = arguments[n];
            l.push(new m(e, t)), 1 !== l.length || s || u(v)
        }, m.prototype.run = function() {
            this.fun.apply(null, this.array)
        }, i.title = "browser", i.browser = !0, i.env = {}, i.argv = [], i.version = "", i.versions = {}, i.on = g, i.addListener = g, i.once = g, i.off = g, i.removeListener = g, i.removeAllListeners = g, i.emit = g, i.prependListener = g, i.prependOnceListener = g, i.listeners = function(e) {
            return []
        }, i.binding = function(e) {
            throw new Error("process.binding is not supported")
        }, i.cwd = function() {
            return "/"
        }, i.chdir = function(e) {
            throw new Error("process.chdir is not supported")
        }, i.umask = function() {
            return 0
        }
    }, {}],
    11: [function(e, n, t) {
        (function(t) {
            var e;
            e = "function" == typeof t ? function(e) {
                t(e)
            } : function(e) {
                setTimeout(e, 0)
            }, n.exports = e
        }).call(this, e("timers").setImmediate)
    }, {
        timers: 12
    }],
    12: [function(u, e, d) {
        (function(e, t) {
            var r = u("process/browser.js").nextTick,
                n = Function.prototype.apply,
                o = Array.prototype.slice,
                i = {},
                a = 0;

            function c(e, t) {
                this._id = e, this._clearFn = t
            }
            d.setTimeout = function() {
                return new c(n.call(setTimeout, window, arguments), clearTimeout)
            }, d.setInterval = function() {
                return new c(n.call(setInterval, window, arguments), clearInterval)
            }, d.clearTimeout = d.clearInterval = function(e) {
                e.close()
            }, c.prototype.unref = c.prototype.ref = function() {}, c.prototype.close = function() {
                this._clearFn.call(window, this._id)
            }, d.enroll = function(e, t) {
                clearTimeout(e._idleTimeoutId), e._idleTimeout = t
            }, d.unenroll = function(e) {
                clearTimeout(e._idleTimeoutId), e._idleTimeout = -1
            }, d._unrefActive = d.active = function(e) {
                clearTimeout(e._idleTimeoutId);
                var t = e._idleTimeout;
                0 <= t && (e._idleTimeoutId = setTimeout(function() {
                    e._onTimeout && e._onTimeout()
                }, t))
            }, d.setImmediate = "function" == typeof e ? e : function(e) {
                var t = a++,
                    n = !(arguments.length < 2) && o.call(arguments, 1);
                return i[t] = !0, r(function() {
                    i[t] && (n ? e.apply(null, n) : e.call(null), d.clearImmediate(t))
                }), t
            }, d.clearImmediate = "function" == typeof t ? t : function(e) {
                delete i[e]
            }
        }).call(this, u("timers").setImmediate, u("timers").clearImmediate)
    }, {
        "process/browser.js": 10,
        timers: 12
    }]
}, {}, [1]);
