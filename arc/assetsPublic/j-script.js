/*! jQuery v2.2.4 | (c) jQuery Foundation | jquery.org/license */ ! function(a, b) { "object" == typeof module && "object" == typeof module.exports ? module.exports = a.document ? b(a, !0) : function(a) { if (!a.document) throw new Error("jQuery requires a window with a document"); return b(a) } : b(a) }("undefined" != typeof window ? window : this, function(a, b) {
    var c = [],
        d = a.document,
        e = c.slice,
        f = c.concat,
        g = c.push,
        h = c.indexOf,
        i = {},
        j = i.toString,
        k = i.hasOwnProperty,
        l = {},
        m = "2.2.4",
        n = function(a, b) { return new n.fn.init(a, b) },
        o = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
        p = /^-ms-/,
        q = /-([\da-z])/gi,
        r = function(a, b) { return b.toUpperCase() };
    n.fn = n.prototype = {
        jquery: m,
        constructor: n,
        selector: "",
        length: 0,
        toArray: function() { return e.call(this) },
        get: function(a) { return null != a ? 0 > a ? this[a + this.length] : this[a] : e.call(this) },
        pushStack: function(a) { var b = n.merge(this.constructor(), a); return b.prevObject = this, b.context = this.context, b },
        each: function(a) { return n.each(this, a) },
        map: function(a) { return this.pushStack(n.map(this, function(b, c) { return a.call(b, c, b) })) },
        slice: function() { return this.pushStack(e.apply(this, arguments)) },
        first: function() { return this.eq(0) },
        last: function() { return this.eq(-1) },
        eq: function(a) {
            var b = this.length,
                c = +a + (0 > a ? b : 0);
            return this.pushStack(c >= 0 && b > c ? [this[c]] : [])
        },
        end: function() { return this.prevObject || this.constructor() },
        push: g,
        sort: c.sort,
        splice: c.splice
    }, n.extend = n.fn.extend = function() {
        var a, b, c, d, e, f, g = arguments[0] || {},
            h = 1,
            i = arguments.length,
            j = !1;
        for ("boolean" == typeof g && (j = g, g = arguments[h] || {}, h++), "object" == typeof g || n.isFunction(g) || (g = {}), h === i && (g = this, h--); i > h; h++)
            if (null != (a = arguments[h]))
                for (b in a) c = g[b], d = a[b], g !== d && (j && d && (n.isPlainObject(d) || (e = n.isArray(d))) ? (e ? (e = !1, f = c && n.isArray(c) ? c : []) : f = c && n.isPlainObject(c) ? c : {}, g[b] = n.extend(j, f, d)) : void 0 !== d && (g[b] = d));
        return g
    }, n.extend({
        expando: "jQuery" + (m + Math.random()).replace(/\D/g, ""),
        isReady: !0,
        error: function(a) { throw new Error(a) },
        noop: function() {},
        isFunction: function(a) { return "function" === n.type(a) },
        isArray: Array.isArray,
        isWindow: function(a) { return null != a && a === a.window },
        isNumeric: function(a) { var b = a && a.toString(); return !n.isArray(a) && b - parseFloat(b) + 1 >= 0 },
        isPlainObject: function(a) { var b; if ("object" !== n.type(a) || a.nodeType || n.isWindow(a)) return !1; if (a.constructor && !k.call(a, "constructor") && !k.call(a.constructor.prototype || {}, "isPrototypeOf")) return !1; for (b in a); return void 0 === b || k.call(a, b) },
        isEmptyObject: function(a) { var b; for (b in a) return !1; return !0 },
        type: function(a) { return null == a ? a + "" : "object" == typeof a || "function" == typeof a ? i[j.call(a)] || "object" : typeof a },
        globalEval: function(a) {
            var b, c = eval;
            a = n.trim(a), a && (1 === a.indexOf("use strict") ? (b = d.createElement("script"), b.text = a, d.head.appendChild(b).parentNode.removeChild(b)) : c(a))
        },
        camelCase: function(a) { return a.replace(p, "ms-").replace(q, r) },
        nodeName: function(a, b) { return a.nodeName && a.nodeName.toLowerCase() === b.toLowerCase() },
        each: function(a, b) {
            var c, d = 0;
            if (s(a)) {
                for (c = a.length; c > d; d++)
                    if (b.call(a[d], d, a[d]) === !1) break
            } else
                for (d in a)
                    if (b.call(a[d], d, a[d]) === !1) break; return a
        },
        trim: function(a) { return null == a ? "" : (a + "").replace(o, "") },
        makeArray: function(a, b) { var c = b || []; return null != a && (s(Object(a)) ? n.merge(c, "string" == typeof a ? [a] : a) : g.call(c, a)), c },
        inArray: function(a, b, c) { return null == b ? -1 : h.call(b, a, c) },
        merge: function(a, b) { for (var c = +b.length, d = 0, e = a.length; c > d; d++) a[e++] = b[d]; return a.length = e, a },
        grep: function(a, b, c) { for (var d, e = [], f = 0, g = a.length, h = !c; g > f; f++) d = !b(a[f], f), d !== h && e.push(a[f]); return e },
        map: function(a, b, c) {
            var d, e, g = 0,
                h = [];
            if (s(a))
                for (d = a.length; d > g; g++) e = b(a[g], g, c), null != e && h.push(e);
            else
                for (g in a) e = b(a[g], g, c), null != e && h.push(e);
            return f.apply([], h)
        },
        guid: 1,
        proxy: function(a, b) { var c, d, f; return "string" == typeof b && (c = a[b], b = a, a = c), n.isFunction(a) ? (d = e.call(arguments, 2), f = function() { return a.apply(b || this, d.concat(e.call(arguments))) }, f.guid = a.guid = a.guid || n.guid++, f) : void 0 },
        now: Date.now,
        support: l
    }), "function" == typeof Symbol && (n.fn[Symbol.iterator] = c[Symbol.iterator]), n.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function(a, b) { i["[object " + b + "]"] = b.toLowerCase() });

    function s(a) {
        var b = !!a && "length" in a && a.length,
            c = n.type(a);
        return "function" === c || n.isWindow(a) ? !1 : "array" === c || 0 === b || "number" == typeof b && b > 0 && b - 1 in a
    }
    var t = function(a) {
        var b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u = "sizzle" + 1 * new Date,
            v = a.document,
            w = 0,
            x = 0,
            y = ga(),
            z = ga(),
            A = ga(),
            B = function(a, b) { return a === b && (l = !0), 0 },
            C = 1 << 31,
            D = {}.hasOwnProperty,
            E = [],
            F = E.pop,
            G = E.push,
            H = E.push,
            I = E.slice,
            J = function(a, b) {
                for (var c = 0, d = a.length; d > c; c++)
                    if (a[c] === b) return c;
                return -1
            },
            K = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
            L = "[\\x20\\t\\r\\n\\f]",
            M = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
            N = "\\[" + L + "*(" + M + ")(?:" + L + "*([*^$|!~]?=)" + L + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + M + "))|)" + L + "*\\]",
            O = ":(" + M + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + N + ")*)|.*)\\)|)",
            P = new RegExp(L + "+", "g"),
            Q = new RegExp("^" + L + "+|((?:^|[^\\\\])(?:\\\\.)*)" + L + "+$", "g"),
            R = new RegExp("^" + L + "*," + L + "*"),
            S = new RegExp("^" + L + "*([>+~]|" + L + ")" + L + "*"),
            T = new RegExp("=" + L + "*([^\\]'\"]*?)" + L + "*\\]", "g"),
            U = new RegExp(O),
            V = new RegExp("^" + M + "$"),
            W = { ID: new RegExp("^#(" + M + ")"), CLASS: new RegExp("^\\.(" + M + ")"), TAG: new RegExp("^(" + M + "|[*])"), ATTR: new RegExp("^" + N), PSEUDO: new RegExp("^" + O), CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + L + "*(even|odd|(([+-]|)(\\d*)n|)" + L + "*(?:([+-]|)" + L + "*(\\d+)|))" + L + "*\\)|)", "i"), bool: new RegExp("^(?:" + K + ")$", "i"), needsContext: new RegExp("^" + L + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + L + "*((?:-\\d)?\\d*)" + L + "*\\)|)(?=[^-]|$)", "i") },
            X = /^(?:input|select|textarea|button)$/i,
            Y = /^h\d$/i,
            Z = /^[^{]+\{\s*\[native \w/,
            $ = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
            _ = /[+~]/,
            aa = /'|\\/g,
            ba = new RegExp("\\\\([\\da-f]{1,6}" + L + "?|(" + L + ")|.)", "ig"),
            ca = function(a, b, c) { var d = "0x" + b - 65536; return d !== d || c ? b : 0 > d ? String.fromCharCode(d + 65536) : String.fromCharCode(d >> 10 | 55296, 1023 & d | 56320) },
            da = function() { m() };
        try { H.apply(E = I.call(v.childNodes), v.childNodes), E[v.childNodes.length].nodeType } catch (ea) {
            H = {
                apply: E.length ? function(a, b) { G.apply(a, I.call(b)) } : function(a, b) {
                    var c = a.length,
                        d = 0;
                    while (a[c++] = b[d++]);
                    a.length = c - 1
                }
            }
        }

        function fa(a, b, d, e) {
            var f, h, j, k, l, o, r, s, w = b && b.ownerDocument,
                x = b ? b.nodeType : 9;
            if (d = d || [], "string" != typeof a || !a || 1 !== x && 9 !== x && 11 !== x) return d;
            if (!e && ((b ? b.ownerDocument || b : v) !== n && m(b), b = b || n, p)) {
                if (11 !== x && (o = $.exec(a)))
                    if (f = o[1]) { if (9 === x) { if (!(j = b.getElementById(f))) return d; if (j.id === f) return d.push(j), d } else if (w && (j = w.getElementById(f)) && t(b, j) && j.id === f) return d.push(j), d } else { if (o[2]) return H.apply(d, b.getElementsByTagName(a)), d; if ((f = o[3]) && c.getElementsByClassName && b.getElementsByClassName) return H.apply(d, b.getElementsByClassName(f)), d }
                if (c.qsa && !A[a + " "] && (!q || !q.test(a))) {
                    if (1 !== x) w = b, s = a;
                    else if ("object" !== b.nodeName.toLowerCase()) {
                        (k = b.getAttribute("id")) ? k = k.replace(aa, "\\$&"): b.setAttribute("id", k = u), r = g(a), h = r.length, l = V.test(k) ? "#" + k : "[id='" + k + "']";
                        while (h--) r[h] = l + " " + qa(r[h]);
                        s = r.join(","), w = _.test(a) && oa(b.parentNode) || b
                    }
                    if (s) try { return H.apply(d, w.querySelectorAll(s)), d } catch (y) {} finally { k === u && b.removeAttribute("id") }
                }
            }
            return i(a.replace(Q, "$1"), b, d, e)
        }

        function ga() {
            var a = [];

            function b(c, e) { return a.push(c + " ") > d.cacheLength && delete b[a.shift()], b[c + " "] = e }
            return b
        }

        function ha(a) { return a[u] = !0, a }

        function ia(a) { var b = n.createElement("div"); try { return !!a(b) } catch (c) { return !1 } finally { b.parentNode && b.parentNode.removeChild(b), b = null } }

        function ja(a, b) {
            var c = a.split("|"),
                e = c.length;
            while (e--) d.attrHandle[c[e]] = b
        }

        function ka(a, b) {
            var c = b && a,
                d = c && 1 === a.nodeType && 1 === b.nodeType && (~b.sourceIndex || C) - (~a.sourceIndex || C);
            if (d) return d;
            if (c)
                while (c = c.nextSibling)
                    if (c === b) return -1;
            return a ? 1 : -1
        }

        function la(a) { return function(b) { var c = b.nodeName.toLowerCase(); return "input" === c && b.type === a } }

        function ma(a) { return function(b) { var c = b.nodeName.toLowerCase(); return ("input" === c || "button" === c) && b.type === a } }

        function na(a) {
            return ha(function(b) {
                return b = +b, ha(function(c, d) {
                    var e, f = a([], c.length, b),
                        g = f.length;
                    while (g--) c[e = f[g]] && (c[e] = !(d[e] = c[e]))
                })
            })
        }

        function oa(a) { return a && "undefined" != typeof a.getElementsByTagName && a }
        c = fa.support = {}, f = fa.isXML = function(a) { var b = a && (a.ownerDocument || a).documentElement; return b ? "HTML" !== b.nodeName : !1 }, m = fa.setDocument = function(a) {
            var b, e, g = a ? a.ownerDocument || a : v;
            return g !== n && 9 === g.nodeType && g.documentElement ? (n = g, o = n.documentElement, p = !f(n), (e = n.defaultView) && e.top !== e && (e.addEventListener ? e.addEventListener("unload", da, !1) : e.attachEvent && e.attachEvent("onunload", da)), c.attributes = ia(function(a) { return a.className = "i", !a.getAttribute("className") }), c.getElementsByTagName = ia(function(a) { return a.appendChild(n.createComment("")), !a.getElementsByTagName("*").length }), c.getElementsByClassName = Z.test(n.getElementsByClassName), c.getById = ia(function(a) { return o.appendChild(a).id = u, !n.getElementsByName || !n.getElementsByName(u).length }), c.getById ? (d.find.ID = function(a, b) { if ("undefined" != typeof b.getElementById && p) { var c = b.getElementById(a); return c ? [c] : [] } }, d.filter.ID = function(a) { var b = a.replace(ba, ca); return function(a) { return a.getAttribute("id") === b } }) : (delete d.find.ID, d.filter.ID = function(a) { var b = a.replace(ba, ca); return function(a) { var c = "undefined" != typeof a.getAttributeNode && a.getAttributeNode("id"); return c && c.value === b } }), d.find.TAG = c.getElementsByTagName ? function(a, b) { return "undefined" != typeof b.getElementsByTagName ? b.getElementsByTagName(a) : c.qsa ? b.querySelectorAll(a) : void 0 } : function(a, b) {
                var c, d = [],
                    e = 0,
                    f = b.getElementsByTagName(a);
                if ("*" === a) { while (c = f[e++]) 1 === c.nodeType && d.push(c); return d }
                return f
            }, d.find.CLASS = c.getElementsByClassName && function(a, b) { return "undefined" != typeof b.getElementsByClassName && p ? b.getElementsByClassName(a) : void 0 }, r = [], q = [], (c.qsa = Z.test(n.querySelectorAll)) && (ia(function(a) { o.appendChild(a).innerHTML = "<a id='" + u + "'></a><select id='" + u + "-\r\\' msallowcapture=''><option selected=''></option></select>", a.querySelectorAll("[msallowcapture^='']").length && q.push("[*^$]=" + L + "*(?:''|\"\")"), a.querySelectorAll("[selected]").length || q.push("\\[" + L + "*(?:value|" + K + ")"), a.querySelectorAll("[id~=" + u + "-]").length || q.push("~="), a.querySelectorAll(":checked").length || q.push(":checked"), a.querySelectorAll("a#" + u + "+*").length || q.push(".#.+[+~]") }), ia(function(a) {
                var b = n.createElement("input");
                b.setAttribute("type", "hidden"), a.appendChild(b).setAttribute("name", "D"), a.querySelectorAll("[name=d]").length && q.push("name" + L + "*[*^$|!~]?="), a.querySelectorAll(":enabled").length || q.push(":enabled", ":disabled"), a.querySelectorAll("*,:x"), q.push(",.*:")
            })), (c.matchesSelector = Z.test(s = o.matches || o.webkitMatchesSelector || o.mozMatchesSelector || o.oMatchesSelector || o.msMatchesSelector)) && ia(function(a) { c.disconnectedMatch = s.call(a, "div"), s.call(a, "[s!='']:x"), r.push("!=", O) }), q = q.length && new RegExp(q.join("|")), r = r.length && new RegExp(r.join("|")), b = Z.test(o.compareDocumentPosition), t = b || Z.test(o.contains) ? function(a, b) {
                var c = 9 === a.nodeType ? a.documentElement : a,
                    d = b && b.parentNode;
                return a === d || !(!d || 1 !== d.nodeType || !(c.contains ? c.contains(d) : a.compareDocumentPosition && 16 & a.compareDocumentPosition(d)))
            } : function(a, b) {
                if (b)
                    while (b = b.parentNode)
                        if (b === a) return !0;
                return !1
            }, B = b ? function(a, b) { if (a === b) return l = !0, 0; var d = !a.compareDocumentPosition - !b.compareDocumentPosition; return d ? d : (d = (a.ownerDocument || a) === (b.ownerDocument || b) ? a.compareDocumentPosition(b) : 1, 1 & d || !c.sortDetached && b.compareDocumentPosition(a) === d ? a === n || a.ownerDocument === v && t(v, a) ? -1 : b === n || b.ownerDocument === v && t(v, b) ? 1 : k ? J(k, a) - J(k, b) : 0 : 4 & d ? -1 : 1) } : function(a, b) {
                if (a === b) return l = !0, 0;
                var c, d = 0,
                    e = a.parentNode,
                    f = b.parentNode,
                    g = [a],
                    h = [b];
                if (!e || !f) return a === n ? -1 : b === n ? 1 : e ? -1 : f ? 1 : k ? J(k, a) - J(k, b) : 0;
                if (e === f) return ka(a, b);
                c = a;
                while (c = c.parentNode) g.unshift(c);
                c = b;
                while (c = c.parentNode) h.unshift(c);
                while (g[d] === h[d]) d++;
                return d ? ka(g[d], h[d]) : g[d] === v ? -1 : h[d] === v ? 1 : 0
            }, n) : n
        }, fa.matches = function(a, b) { return fa(a, null, null, b) }, fa.matchesSelector = function(a, b) {
            if ((a.ownerDocument || a) !== n && m(a), b = b.replace(T, "='$1']"), c.matchesSelector && p && !A[b + " "] && (!r || !r.test(b)) && (!q || !q.test(b))) try { var d = s.call(a, b); if (d || c.disconnectedMatch || a.document && 11 !== a.document.nodeType) return d } catch (e) {}
            return fa(b, n, null, [a]).length > 0
        }, fa.contains = function(a, b) { return (a.ownerDocument || a) !== n && m(a), t(a, b) }, fa.attr = function(a, b) {
            (a.ownerDocument || a) !== n && m(a);
            var e = d.attrHandle[b.toLowerCase()],
                f = e && D.call(d.attrHandle, b.toLowerCase()) ? e(a, b, !p) : void 0;
            return void 0 !== f ? f : c.attributes || !p ? a.getAttribute(b) : (f = a.getAttributeNode(b)) && f.specified ? f.value : null
        }, fa.error = function(a) { throw new Error("Syntax error, unrecognized expression: " + a) }, fa.uniqueSort = function(a) {
            var b, d = [],
                e = 0,
                f = 0;
            if (l = !c.detectDuplicates, k = !c.sortStable && a.slice(0), a.sort(B), l) { while (b = a[f++]) b === a[f] && (e = d.push(f)); while (e--) a.splice(d[e], 1) }
            return k = null, a
        }, e = fa.getText = function(a) {
            var b, c = "",
                d = 0,
                f = a.nodeType;
            if (f) { if (1 === f || 9 === f || 11 === f) { if ("string" == typeof a.textContent) return a.textContent; for (a = a.firstChild; a; a = a.nextSibling) c += e(a) } else if (3 === f || 4 === f) return a.nodeValue } else
                while (b = a[d++]) c += e(b);
            return c
        }, d = fa.selectors = {
            cacheLength: 50,
            createPseudo: ha,
            match: W,
            attrHandle: {},
            find: {},
            relative: { ">": { dir: "parentNode", first: !0 }, " ": { dir: "parentNode" }, "+": { dir: "previousSibling", first: !0 }, "~": { dir: "previousSibling" } },
            preFilter: { ATTR: function(a) { return a[1] = a[1].replace(ba, ca), a[3] = (a[3] || a[4] || a[5] || "").replace(ba, ca), "~=" === a[2] && (a[3] = " " + a[3] + " "), a.slice(0, 4) }, CHILD: function(a) { return a[1] = a[1].toLowerCase(), "nth" === a[1].slice(0, 3) ? (a[3] || fa.error(a[0]), a[4] = +(a[4] ? a[5] + (a[6] || 1) : 2 * ("even" === a[3] || "odd" === a[3])), a[5] = +(a[7] + a[8] || "odd" === a[3])) : a[3] && fa.error(a[0]), a }, PSEUDO: function(a) { var b, c = !a[6] && a[2]; return W.CHILD.test(a[0]) ? null : (a[3] ? a[2] = a[4] || a[5] || "" : c && U.test(c) && (b = g(c, !0)) && (b = c.indexOf(")", c.length - b) - c.length) && (a[0] = a[0].slice(0, b), a[2] = c.slice(0, b)), a.slice(0, 3)) } },
            filter: {
                TAG: function(a) { var b = a.replace(ba, ca).toLowerCase(); return "*" === a ? function() { return !0 } : function(a) { return a.nodeName && a.nodeName.toLowerCase() === b } },
                CLASS: function(a) { var b = y[a + " "]; return b || (b = new RegExp("(^|" + L + ")" + a + "(" + L + "|$)")) && y(a, function(a) { return b.test("string" == typeof a.className && a.className || "undefined" != typeof a.getAttribute && a.getAttribute("class") || "") }) },
                ATTR: function(a, b, c) { return function(d) { var e = fa.attr(d, a); return null == e ? "!=" === b : b ? (e += "", "=" === b ? e === c : "!=" === b ? e !== c : "^=" === b ? c && 0 === e.indexOf(c) : "*=" === b ? c && e.indexOf(c) > -1 : "$=" === b ? c && e.slice(-c.length) === c : "~=" === b ? (" " + e.replace(P, " ") + " ").indexOf(c) > -1 : "|=" === b ? e === c || e.slice(0, c.length + 1) === c + "-" : !1) : !0 } },
                CHILD: function(a, b, c, d, e) {
                    var f = "nth" !== a.slice(0, 3),
                        g = "last" !== a.slice(-4),
                        h = "of-type" === b;
                    return 1 === d && 0 === e ? function(a) { return !!a.parentNode } : function(b, c, i) {
                        var j, k, l, m, n, o, p = f !== g ? "nextSibling" : "previousSibling",
                            q = b.parentNode,
                            r = h && b.nodeName.toLowerCase(),
                            s = !i && !h,
                            t = !1;
                        if (q) {
                            if (f) {
                                while (p) {
                                    m = b;
                                    while (m = m[p])
                                        if (h ? m.nodeName.toLowerCase() === r : 1 === m.nodeType) return !1;
                                    o = p = "only" === a && !o && "nextSibling"
                                }
                                return !0
                            }
                            if (o = [g ? q.firstChild : q.lastChild], g && s) {
                                m = q, l = m[u] || (m[u] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), j = k[a] || [], n = j[0] === w && j[1], t = n && j[2], m = n && q.childNodes[n];
                                while (m = ++n && m && m[p] || (t = n = 0) || o.pop())
                                    if (1 === m.nodeType && ++t && m === b) { k[a] = [w, n, t]; break }
                            } else if (s && (m = b, l = m[u] || (m[u] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), j = k[a] || [], n = j[0] === w && j[1], t = n), t === !1)
                                while (m = ++n && m && m[p] || (t = n = 0) || o.pop())
                                    if ((h ? m.nodeName.toLowerCase() === r : 1 === m.nodeType) && ++t && (s && (l = m[u] || (m[u] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), k[a] = [w, t]), m === b)) break;
                            return t -= e, t === d || t % d === 0 && t / d >= 0
                        }
                    }
                },
                PSEUDO: function(a, b) {
                    var c, e = d.pseudos[a] || d.setFilters[a.toLowerCase()] || fa.error("unsupported pseudo: " + a);
                    return e[u] ? e(b) : e.length > 1 ? (c = [a, a, "", b], d.setFilters.hasOwnProperty(a.toLowerCase()) ? ha(function(a, c) {
                        var d, f = e(a, b),
                            g = f.length;
                        while (g--) d = J(a, f[g]), a[d] = !(c[d] = f[g])
                    }) : function(a) { return e(a, 0, c) }) : e
                }
            },
            pseudos: {
                not: ha(function(a) {
                    var b = [],
                        c = [],
                        d = h(a.replace(Q, "$1"));
                    return d[u] ? ha(function(a, b, c, e) {
                        var f, g = d(a, null, e, []),
                            h = a.length;
                        while (h--)(f = g[h]) && (a[h] = !(b[h] = f))
                    }) : function(a, e, f) { return b[0] = a, d(b, null, f, c), b[0] = null, !c.pop() }
                }),
                has: ha(function(a) { return function(b) { return fa(a, b).length > 0 } }),
                contains: ha(function(a) {
                    return a = a.replace(ba, ca),
                        function(b) { return (b.textContent || b.innerText || e(b)).indexOf(a) > -1 }
                }),
                lang: ha(function(a) {
                    return V.test(a || "") || fa.error("unsupported lang: " + a), a = a.replace(ba, ca).toLowerCase(),
                        function(b) {
                            var c;
                            do
                                if (c = p ? b.lang : b.getAttribute("xml:lang") || b.getAttribute("lang")) return c = c.toLowerCase(), c === a || 0 === c.indexOf(a + "-");
                            while ((b = b.parentNode) && 1 === b.nodeType);
                            return !1
                        }
                }),
                target: function(b) { var c = a.location && a.location.hash; return c && c.slice(1) === b.id },
                root: function(a) { return a === o },
                focus: function(a) { return a === n.activeElement && (!n.hasFocus || n.hasFocus()) && !!(a.type || a.href || ~a.tabIndex) },
                enabled: function(a) { return a.disabled === !1 },
                disabled: function(a) { return a.disabled === !0 },
                checked: function(a) { var b = a.nodeName.toLowerCase(); return "input" === b && !!a.checked || "option" === b && !!a.selected },
                selected: function(a) { return a.parentNode && a.parentNode.selectedIndex, a.selected === !0 },
                empty: function(a) {
                    for (a = a.firstChild; a; a = a.nextSibling)
                        if (a.nodeType < 6) return !1;
                    return !0
                },
                parent: function(a) { return !d.pseudos.empty(a) },
                header: function(a) { return Y.test(a.nodeName) },
                input: function(a) { return X.test(a.nodeName) },
                button: function(a) { var b = a.nodeName.toLowerCase(); return "input" === b && "button" === a.type || "button" === b },
                text: function(a) { var b; return "input" === a.nodeName.toLowerCase() && "text" === a.type && (null == (b = a.getAttribute("type")) || "text" === b.toLowerCase()) },
                first: na(function() { return [0] }),
                last: na(function(a, b) { return [b - 1] }),
                eq: na(function(a, b, c) { return [0 > c ? c + b : c] }),
                even: na(function(a, b) { for (var c = 0; b > c; c += 2) a.push(c); return a }),
                odd: na(function(a, b) { for (var c = 1; b > c; c += 2) a.push(c); return a }),
                lt: na(function(a, b, c) { for (var d = 0 > c ? c + b : c; --d >= 0;) a.push(d); return a }),
                gt: na(function(a, b, c) { for (var d = 0 > c ? c + b : c; ++d < b;) a.push(d); return a })
            }
        }, d.pseudos.nth = d.pseudos.eq;
        for (b in { radio: !0, checkbox: !0, file: !0, password: !0, image: !0 }) d.pseudos[b] = la(b);
        for (b in { submit: !0, reset: !0 }) d.pseudos[b] = ma(b);

        function pa() {}
        pa.prototype = d.filters = d.pseudos, d.setFilters = new pa, g = fa.tokenize = function(a, b) {
            var c, e, f, g, h, i, j, k = z[a + " "];
            if (k) return b ? 0 : k.slice(0);
            h = a, i = [], j = d.preFilter;
            while (h) { c && !(e = R.exec(h)) || (e && (h = h.slice(e[0].length) || h), i.push(f = [])), c = !1, (e = S.exec(h)) && (c = e.shift(), f.push({ value: c, type: e[0].replace(Q, " ") }), h = h.slice(c.length)); for (g in d.filter) !(e = W[g].exec(h)) || j[g] && !(e = j[g](e)) || (c = e.shift(), f.push({ value: c, type: g, matches: e }), h = h.slice(c.length)); if (!c) break }
            return b ? h.length : h ? fa.error(a) : z(a, i).slice(0)
        };

        function qa(a) { for (var b = 0, c = a.length, d = ""; c > b; b++) d += a[b].value; return d }

        function ra(a, b, c) {
            var d = b.dir,
                e = c && "parentNode" === d,
                f = x++;
            return b.first ? function(b, c, f) {
                while (b = b[d])
                    if (1 === b.nodeType || e) return a(b, c, f)
            } : function(b, c, g) {
                var h, i, j, k = [w, f];
                if (g) {
                    while (b = b[d])
                        if ((1 === b.nodeType || e) && a(b, c, g)) return !0
                } else
                    while (b = b[d])
                        if (1 === b.nodeType || e) { if (j = b[u] || (b[u] = {}), i = j[b.uniqueID] || (j[b.uniqueID] = {}), (h = i[d]) && h[0] === w && h[1] === f) return k[2] = h[2]; if (i[d] = k, k[2] = a(b, c, g)) return !0 }
            }
        }

        function sa(a) {
            return a.length > 1 ? function(b, c, d) {
                var e = a.length;
                while (e--)
                    if (!a[e](b, c, d)) return !1;
                return !0
            } : a[0]
        }

        function ta(a, b, c) { for (var d = 0, e = b.length; e > d; d++) fa(a, b[d], c); return c }

        function ua(a, b, c, d, e) { for (var f, g = [], h = 0, i = a.length, j = null != b; i > h; h++)(f = a[h]) && (c && !c(f, d, e) || (g.push(f), j && b.push(h))); return g }

        function va(a, b, c, d, e, f) {
            return d && !d[u] && (d = va(d)), e && !e[u] && (e = va(e, f)), ha(function(f, g, h, i) {
                var j, k, l, m = [],
                    n = [],
                    o = g.length,
                    p = f || ta(b || "*", h.nodeType ? [h] : h, []),
                    q = !a || !f && b ? p : ua(p, m, a, h, i),
                    r = c ? e || (f ? a : o || d) ? [] : g : q;
                if (c && c(q, r, h, i), d) { j = ua(r, n), d(j, [], h, i), k = j.length; while (k--)(l = j[k]) && (r[n[k]] = !(q[n[k]] = l)) }
                if (f) {
                    if (e || a) {
                        if (e) {
                            j = [], k = r.length;
                            while (k--)(l = r[k]) && j.push(q[k] = l);
                            e(null, r = [], j, i)
                        }
                        k = r.length;
                        while (k--)(l = r[k]) && (j = e ? J(f, l) : m[k]) > -1 && (f[j] = !(g[j] = l))
                    }
                } else r = ua(r === g ? r.splice(o, r.length) : r), e ? e(null, g, r, i) : H.apply(g, r)
            })
        }

        function wa(a) {
            for (var b, c, e, f = a.length, g = d.relative[a[0].type], h = g || d.relative[" "], i = g ? 1 : 0, k = ra(function(a) { return a === b }, h, !0), l = ra(function(a) { return J(b, a) > -1 }, h, !0), m = [function(a, c, d) { var e = !g && (d || c !== j) || ((b = c).nodeType ? k(a, c, d) : l(a, c, d)); return b = null, e }]; f > i; i++)
                if (c = d.relative[a[i].type]) m = [ra(sa(m), c)];
                else {
                    if (c = d.filter[a[i].type].apply(null, a[i].matches), c[u]) {
                        for (e = ++i; f > e; e++)
                            if (d.relative[a[e].type]) break;
                        return va(i > 1 && sa(m), i > 1 && qa(a.slice(0, i - 1).concat({ value: " " === a[i - 2].type ? "*" : "" })).replace(Q, "$1"), c, e > i && wa(a.slice(i, e)), f > e && wa(a = a.slice(e)), f > e && qa(a))
                    }
                    m.push(c)
                }
            return sa(m)
        }

        function xa(a, b) {
            var c = b.length > 0,
                e = a.length > 0,
                f = function(f, g, h, i, k) {
                    var l, o, q, r = 0,
                        s = "0",
                        t = f && [],
                        u = [],
                        v = j,
                        x = f || e && d.find.TAG("*", k),
                        y = w += null == v ? 1 : Math.random() || .1,
                        z = x.length;
                    for (k && (j = g === n || g || k); s !== z && null != (l = x[s]); s++) {
                        if (e && l) {
                            o = 0, g || l.ownerDocument === n || (m(l), h = !p);
                            while (q = a[o++])
                                if (q(l, g || n, h)) { i.push(l); break }
                            k && (w = y)
                        }
                        c && ((l = !q && l) && r--, f && t.push(l))
                    }
                    if (r += s, c && s !== r) {
                        o = 0;
                        while (q = b[o++]) q(t, u, g, h);
                        if (f) {
                            if (r > 0)
                                while (s--) t[s] || u[s] || (u[s] = F.call(i));
                            u = ua(u)
                        }
                        H.apply(i, u), k && !f && u.length > 0 && r + b.length > 1 && fa.uniqueSort(i)
                    }
                    return k && (w = y, j = v), t
                };
            return c ? ha(f) : f
        }
        return h = fa.compile = function(a, b) {
            var c, d = [],
                e = [],
                f = A[a + " "];
            if (!f) {
                b || (b = g(a)), c = b.length;
                while (c--) f = wa(b[c]), f[u] ? d.push(f) : e.push(f);
                f = A(a, xa(e, d)), f.selector = a
            }
            return f
        }, i = fa.select = function(a, b, e, f) {
            var i, j, k, l, m, n = "function" == typeof a && a,
                o = !f && g(a = n.selector || a);
            if (e = e || [], 1 === o.length) {
                if (j = o[0] = o[0].slice(0), j.length > 2 && "ID" === (k = j[0]).type && c.getById && 9 === b.nodeType && p && d.relative[j[1].type]) {
                    if (b = (d.find.ID(k.matches[0].replace(ba, ca), b) || [])[0], !b) return e;
                    n && (b = b.parentNode), a = a.slice(j.shift().value.length)
                }
                i = W.needsContext.test(a) ? 0 : j.length;
                while (i--) { if (k = j[i], d.relative[l = k.type]) break; if ((m = d.find[l]) && (f = m(k.matches[0].replace(ba, ca), _.test(j[0].type) && oa(b.parentNode) || b))) { if (j.splice(i, 1), a = f.length && qa(j), !a) return H.apply(e, f), e; break } }
            }
            return (n || h(a, o))(f, b, !p, e, !b || _.test(a) && oa(b.parentNode) || b), e
        }, c.sortStable = u.split("").sort(B).join("") === u, c.detectDuplicates = !!l, m(), c.sortDetached = ia(function(a) { return 1 & a.compareDocumentPosition(n.createElement("div")) }), ia(function(a) { return a.innerHTML = "<a href='#'></a>", "#" === a.firstChild.getAttribute("href") }) || ja("type|href|height|width", function(a, b, c) { return c ? void 0 : a.getAttribute(b, "type" === b.toLowerCase() ? 1 : 2) }), c.attributes && ia(function(a) { return a.innerHTML = "<input/>", a.firstChild.setAttribute("value", ""), "" === a.firstChild.getAttribute("value") }) || ja("value", function(a, b, c) { return c || "input" !== a.nodeName.toLowerCase() ? void 0 : a.defaultValue }), ia(function(a) { return null == a.getAttribute("disabled") }) || ja(K, function(a, b, c) { var d; return c ? void 0 : a[b] === !0 ? b.toLowerCase() : (d = a.getAttributeNode(b)) && d.specified ? d.value : null }), fa
    }(a);
    n.find = t, n.expr = t.selectors, n.expr[":"] = n.expr.pseudos, n.uniqueSort = n.unique = t.uniqueSort, n.text = t.getText, n.isXMLDoc = t.isXML, n.contains = t.contains;
    var u = function(a, b, c) {
            var d = [],
                e = void 0 !== c;
            while ((a = a[b]) && 9 !== a.nodeType)
                if (1 === a.nodeType) {
                    if (e && n(a).is(c)) break;
                    d.push(a)
                }
            return d
        },
        v = function(a, b) { for (var c = []; a; a = a.nextSibling) 1 === a.nodeType && a !== b && c.push(a); return c },
        w = n.expr.match.needsContext,
        x = /^<([\w-]+)\s*\/?>(?:<\/\1>|)$/,
        y = /^.[^:#\[\.,]*$/;

    function z(a, b, c) {
        if (n.isFunction(b)) return n.grep(a, function(a, d) { return !!b.call(a, d, a) !== c });
        if (b.nodeType) return n.grep(a, function(a) { return a === b !== c });
        if ("string" == typeof b) {
            if (y.test(b)) return n.filter(b, a, c);
            b = n.filter(b, a)
        }
        return n.grep(a, function(a) { return h.call(b, a) > -1 !== c })
    }
    n.filter = function(a, b, c) { var d = b[0]; return c && (a = ":not(" + a + ")"), 1 === b.length && 1 === d.nodeType ? n.find.matchesSelector(d, a) ? [d] : [] : n.find.matches(a, n.grep(b, function(a) { return 1 === a.nodeType })) }, n.fn.extend({
        find: function(a) {
            var b, c = this.length,
                d = [],
                e = this;
            if ("string" != typeof a) return this.pushStack(n(a).filter(function() {
                for (b = 0; c > b; b++)
                    if (n.contains(e[b], this)) return !0
            }));
            for (b = 0; c > b; b++) n.find(a, e[b], d);
            return d = this.pushStack(c > 1 ? n.unique(d) : d), d.selector = this.selector ? this.selector + " " + a : a, d
        },
        filter: function(a) { return this.pushStack(z(this, a || [], !1)) },
        not: function(a) { return this.pushStack(z(this, a || [], !0)) },
        is: function(a) { return !!z(this, "string" == typeof a && w.test(a) ? n(a) : a || [], !1).length }
    });
    var A, B = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
        C = n.fn.init = function(a, b, c) {
            var e, f;
            if (!a) return this;
            if (c = c || A, "string" == typeof a) {
                if (e = "<" === a[0] && ">" === a[a.length - 1] && a.length >= 3 ? [null, a, null] : B.exec(a), !e || !e[1] && b) return !b || b.jquery ? (b || c).find(a) : this.constructor(b).find(a);
                if (e[1]) {
                    if (b = b instanceof n ? b[0] : b, n.merge(this, n.parseHTML(e[1], b && b.nodeType ? b.ownerDocument || b : d, !0)), x.test(e[1]) && n.isPlainObject(b))
                        for (e in b) n.isFunction(this[e]) ? this[e](b[e]) : this.attr(e, b[e]);
                    return this
                }
                return f = d.getElementById(e[2]), f && f.parentNode && (this.length = 1, this[0] = f), this.context = d, this.selector = a, this
            }
            return a.nodeType ? (this.context = this[0] = a, this.length = 1, this) : n.isFunction(a) ? void 0 !== c.ready ? c.ready(a) : a(n) : (void 0 !== a.selector && (this.selector = a.selector, this.context = a.context), n.makeArray(a, this))
        };
    C.prototype = n.fn, A = n(d);
    var D = /^(?:parents|prev(?:Until|All))/,
        E = { children: !0, contents: !0, next: !0, prev: !0 };
    n.fn.extend({
        has: function(a) {
            var b = n(a, this),
                c = b.length;
            return this.filter(function() {
                for (var a = 0; c > a; a++)
                    if (n.contains(this, b[a])) return !0
            })
        },
        closest: function(a, b) {
            for (var c, d = 0, e = this.length, f = [], g = w.test(a) || "string" != typeof a ? n(a, b || this.context) : 0; e > d; d++)
                for (c = this[d]; c && c !== b; c = c.parentNode)
                    if (c.nodeType < 11 && (g ? g.index(c) > -1 : 1 === c.nodeType && n.find.matchesSelector(c, a))) { f.push(c); break }
            return this.pushStack(f.length > 1 ? n.uniqueSort(f) : f)
        },
        index: function(a) { return a ? "string" == typeof a ? h.call(n(a), this[0]) : h.call(this, a.jquery ? a[0] : a) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1 },
        add: function(a, b) { return this.pushStack(n.uniqueSort(n.merge(this.get(), n(a, b)))) },
        addBack: function(a) { return this.add(null == a ? this.prevObject : this.prevObject.filter(a)) }
    });

    function F(a, b) { while ((a = a[b]) && 1 !== a.nodeType); return a }
    n.each({ parent: function(a) { var b = a.parentNode; return b && 11 !== b.nodeType ? b : null }, parents: function(a) { return u(a, "parentNode") }, parentsUntil: function(a, b, c) { return u(a, "parentNode", c) }, next: function(a) { return F(a, "nextSibling") }, prev: function(a) { return F(a, "previousSibling") }, nextAll: function(a) { return u(a, "nextSibling") }, prevAll: function(a) { return u(a, "previousSibling") }, nextUntil: function(a, b, c) { return u(a, "nextSibling", c) }, prevUntil: function(a, b, c) { return u(a, "previousSibling", c) }, siblings: function(a) { return v((a.parentNode || {}).firstChild, a) }, children: function(a) { return v(a.firstChild) }, contents: function(a) { return a.contentDocument || n.merge([], a.childNodes) } }, function(a, b) { n.fn[a] = function(c, d) { var e = n.map(this, b, c); return "Until" !== a.slice(-5) && (d = c), d && "string" == typeof d && (e = n.filter(d, e)), this.length > 1 && (E[a] || n.uniqueSort(e), D.test(a) && e.reverse()), this.pushStack(e) } });
    var G = /\S+/g;

    function H(a) { var b = {}; return n.each(a.match(G) || [], function(a, c) { b[c] = !0 }), b }
    n.Callbacks = function(a) {
        a = "string" == typeof a ? H(a) : n.extend({}, a);
        var b, c, d, e, f = [],
            g = [],
            h = -1,
            i = function() {
                for (e = a.once, d = b = !0; g.length; h = -1) { c = g.shift(); while (++h < f.length) f[h].apply(c[0], c[1]) === !1 && a.stopOnFalse && (h = f.length, c = !1) }
                a.memory || (c = !1), b = !1, e && (f = c ? [] : "")
            },
            j = { add: function() { return f && (c && !b && (h = f.length - 1, g.push(c)), function d(b) { n.each(b, function(b, c) { n.isFunction(c) ? a.unique && j.has(c) || f.push(c) : c && c.length && "string" !== n.type(c) && d(c) }) }(arguments), c && !b && i()), this }, remove: function() { return n.each(arguments, function(a, b) { var c; while ((c = n.inArray(b, f, c)) > -1) f.splice(c, 1), h >= c && h-- }), this }, has: function(a) { return a ? n.inArray(a, f) > -1 : f.length > 0 }, empty: function() { return f && (f = []), this }, disable: function() { return e = g = [], f = c = "", this }, disabled: function() { return !f }, lock: function() { return e = g = [], c || (f = c = ""), this }, locked: function() { return !!e }, fireWith: function(a, c) { return e || (c = c || [], c = [a, c.slice ? c.slice() : c], g.push(c), b || i()), this }, fire: function() { return j.fireWith(this, arguments), this }, fired: function() { return !!d } };
        return j
    }, n.extend({
        Deferred: function(a) {
            var b = [
                    ["resolve", "done", n.Callbacks("once memory"), "resolved"],
                    ["reject", "fail", n.Callbacks("once memory"), "rejected"],
                    ["notify", "progress", n.Callbacks("memory")]
                ],
                c = "pending",
                d = {
                    state: function() { return c },
                    always: function() { return e.done(arguments).fail(arguments), this },
                    then: function() {
                        var a = arguments;
                        return n.Deferred(function(c) {
                            n.each(b, function(b, f) {
                                var g = n.isFunction(a[b]) && a[b];
                                e[f[1]](function() {
                                    var a = g && g.apply(this, arguments);
                                    a && n.isFunction(a.promise) ? a.promise().progress(c.notify).done(c.resolve).fail(c.reject) : c[f[0] + "With"](this === d ? c.promise() : this, g ? [a] : arguments)
                                })
                            }), a = null
                        }).promise()
                    },
                    promise: function(a) { return null != a ? n.extend(a, d) : d }
                },
                e = {};
            return d.pipe = d.then, n.each(b, function(a, f) {
                var g = f[2],
                    h = f[3];
                d[f[1]] = g.add, h && g.add(function() { c = h }, b[1 ^ a][2].disable, b[2][2].lock), e[f[0]] = function() { return e[f[0] + "With"](this === e ? d : this, arguments), this }, e[f[0] + "With"] = g.fireWith
            }), d.promise(e), a && a.call(e, e), e
        },
        when: function(a) {
            var b = 0,
                c = e.call(arguments),
                d = c.length,
                f = 1 !== d || a && n.isFunction(a.promise) ? d : 0,
                g = 1 === f ? a : n.Deferred(),
                h = function(a, b, c) { return function(d) { b[a] = this, c[a] = arguments.length > 1 ? e.call(arguments) : d, c === i ? g.notifyWith(b, c) : --f || g.resolveWith(b, c) } },
                i, j, k;
            if (d > 1)
                for (i = new Array(d), j = new Array(d), k = new Array(d); d > b; b++) c[b] && n.isFunction(c[b].promise) ? c[b].promise().progress(h(b, j, i)).done(h(b, k, c)).fail(g.reject) : --f;
            return f || g.resolveWith(k, c), g.promise()
        }
    });
    var I;
    n.fn.ready = function(a) { return n.ready.promise().done(a), this }, n.extend({
        isReady: !1,
        readyWait: 1,
        holdReady: function(a) { a ? n.readyWait++ : n.ready(!0) },
        ready: function(a) {
            (a === !0 ? --n.readyWait : n.isReady) || (n.isReady = !0, a !== !0 && --n.readyWait > 0 || (I.resolveWith(d, [n]), n.fn.triggerHandler && (n(d).triggerHandler("ready"), n(d).off("ready"))))
        }
    });

    function J() { d.removeEventListener("DOMContentLoaded", J), a.removeEventListener("load", J), n.ready() }
    n.ready.promise = function(b) { return I || (I = n.Deferred(), "complete" === d.readyState || "loading" !== d.readyState && !d.documentElement.doScroll ? a.setTimeout(n.ready) : (d.addEventListener("DOMContentLoaded", J), a.addEventListener("load", J))), I.promise(b) }, n.ready.promise();
    var K = function(a, b, c, d, e, f, g) {
            var h = 0,
                i = a.length,
                j = null == c;
            if ("object" === n.type(c)) { e = !0; for (h in c) K(a, b, h, c[h], !0, f, g) } else if (void 0 !== d && (e = !0, n.isFunction(d) || (g = !0), j && (g ? (b.call(a, d), b = null) : (j = b, b = function(a, b, c) { return j.call(n(a), c) })), b))
                for (; i > h; h++) b(a[h], c, g ? d : d.call(a[h], h, b(a[h], c)));
            return e ? a : j ? b.call(a) : i ? b(a[0], c) : f
        },
        L = function(a) { return 1 === a.nodeType || 9 === a.nodeType || !+a.nodeType };

    function M() { this.expando = n.expando + M.uid++ }
    M.uid = 1, M.prototype = {
        register: function(a, b) { var c = b || {}; return a.nodeType ? a[this.expando] = c : Object.defineProperty(a, this.expando, { value: c, writable: !0, configurable: !0 }), a[this.expando] },
        cache: function(a) { if (!L(a)) return {}; var b = a[this.expando]; return b || (b = {}, L(a) && (a.nodeType ? a[this.expando] = b : Object.defineProperty(a, this.expando, { value: b, configurable: !0 }))), b },
        set: function(a, b, c) {
            var d, e = this.cache(a);
            if ("string" == typeof b) e[b] = c;
            else
                for (d in b) e[d] = b[d];
            return e
        },
        get: function(a, b) { return void 0 === b ? this.cache(a) : a[this.expando] && a[this.expando][b] },
        access: function(a, b, c) { var d; return void 0 === b || b && "string" == typeof b && void 0 === c ? (d = this.get(a, b), void 0 !== d ? d : this.get(a, n.camelCase(b))) : (this.set(a, b, c), void 0 !== c ? c : b) },
        remove: function(a, b) {
            var c, d, e, f = a[this.expando];
            if (void 0 !== f) {
                if (void 0 === b) this.register(a);
                else { n.isArray(b) ? d = b.concat(b.map(n.camelCase)) : (e = n.camelCase(b), b in f ? d = [b, e] : (d = e, d = d in f ? [d] : d.match(G) || [])), c = d.length; while (c--) delete f[d[c]] }(void 0 === b || n.isEmptyObject(f)) && (a.nodeType ? a[this.expando] = void 0 : delete a[this.expando])
            }
        },
        hasData: function(a) { var b = a[this.expando]; return void 0 !== b && !n.isEmptyObject(b) }
    };
    var N = new M,
        O = new M,
        P = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
        Q = /[A-Z]/g;

    function R(a, b, c) {
        var d;
        if (void 0 === c && 1 === a.nodeType)
            if (d = "data-" + b.replace(Q, "-$&").toLowerCase(), c = a.getAttribute(d), "string" == typeof c) {
                try {
                    c = "true" === c ? !0 : "false" === c ? !1 : "null" === c ? null : +c + "" === c ? +c : P.test(c) ? n.parseJSON(c) : c;
                } catch (e) {}
                O.set(a, b, c)
            } else c = void 0;
        return c
    }
    n.extend({ hasData: function(a) { return O.hasData(a) || N.hasData(a) }, data: function(a, b, c) { return O.access(a, b, c) }, removeData: function(a, b) { O.remove(a, b) }, _data: function(a, b, c) { return N.access(a, b, c) }, _removeData: function(a, b) { N.remove(a, b) } }), n.fn.extend({
        data: function(a, b) {
            var c, d, e, f = this[0],
                g = f && f.attributes;
            if (void 0 === a) {
                if (this.length && (e = O.get(f), 1 === f.nodeType && !N.get(f, "hasDataAttrs"))) {
                    c = g.length;
                    while (c--) g[c] && (d = g[c].name, 0 === d.indexOf("data-") && (d = n.camelCase(d.slice(5)), R(f, d, e[d])));
                    N.set(f, "hasDataAttrs", !0)
                }
                return e
            }
            return "object" == typeof a ? this.each(function() { O.set(this, a) }) : K(this, function(b) {
                var c, d;
                if (f && void 0 === b) { if (c = O.get(f, a) || O.get(f, a.replace(Q, "-$&").toLowerCase()), void 0 !== c) return c; if (d = n.camelCase(a), c = O.get(f, d), void 0 !== c) return c; if (c = R(f, d, void 0), void 0 !== c) return c } else d = n.camelCase(a), this.each(function() {
                    var c = O.get(this, d);
                    O.set(this, d, b), a.indexOf("-") > -1 && void 0 !== c && O.set(this, a, b)
                })
            }, null, b, arguments.length > 1, null, !0)
        },
        removeData: function(a) { return this.each(function() { O.remove(this, a) }) }
    }), n.extend({
        queue: function(a, b, c) { var d; return a ? (b = (b || "fx") + "queue", d = N.get(a, b), c && (!d || n.isArray(c) ? d = N.access(a, b, n.makeArray(c)) : d.push(c)), d || []) : void 0 },
        dequeue: function(a, b) {
            b = b || "fx";
            var c = n.queue(a, b),
                d = c.length,
                e = c.shift(),
                f = n._queueHooks(a, b),
                g = function() { n.dequeue(a, b) };
            "inprogress" === e && (e = c.shift(), d--), e && ("fx" === b && c.unshift("inprogress"), delete f.stop, e.call(a, g, f)), !d && f && f.empty.fire()
        },
        _queueHooks: function(a, b) { var c = b + "queueHooks"; return N.get(a, c) || N.access(a, c, { empty: n.Callbacks("once memory").add(function() { N.remove(a, [b + "queue", c]) }) }) }
    }), n.fn.extend({
        queue: function(a, b) {
            var c = 2;
            return "string" != typeof a && (b = a, a = "fx", c--), arguments.length < c ? n.queue(this[0], a) : void 0 === b ? this : this.each(function() {
                var c = n.queue(this, a, b);
                n._queueHooks(this, a), "fx" === a && "inprogress" !== c[0] && n.dequeue(this, a)
            })
        },
        dequeue: function(a) { return this.each(function() { n.dequeue(this, a) }) },
        clearQueue: function(a) { return this.queue(a || "fx", []) },
        promise: function(a, b) {
            var c, d = 1,
                e = n.Deferred(),
                f = this,
                g = this.length,
                h = function() {--d || e.resolveWith(f, [f]) };
            "string" != typeof a && (b = a, a = void 0), a = a || "fx";
            while (g--) c = N.get(f[g], a + "queueHooks"), c && c.empty && (d++, c.empty.add(h));
            return h(), e.promise(b)
        }
    });
    var S = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        T = new RegExp("^(?:([+-])=|)(" + S + ")([a-z%]*)$", "i"),
        U = ["Top", "Right", "Bottom", "Left"],
        V = function(a, b) { return a = b || a, "none" === n.css(a, "display") || !n.contains(a.ownerDocument, a) };

    function W(a, b, c, d) {
        var e, f = 1,
            g = 20,
            h = d ? function() { return d.cur() } : function() { return n.css(a, b, "") },
            i = h(),
            j = c && c[3] || (n.cssNumber[b] ? "" : "px"),
            k = (n.cssNumber[b] || "px" !== j && +i) && T.exec(n.css(a, b));
        if (k && k[3] !== j) {
            j = j || k[3], c = c || [], k = +i || 1;
            do f = f || ".5", k /= f, n.style(a, b, k + j); while (f !== (f = h() / i) && 1 !== f && --g)
        }
        return c && (k = +k || +i || 0, e = c[1] ? k + (c[1] + 1) * c[2] : +c[2], d && (d.unit = j, d.start = k, d.end = e)), e
    }
    var X = /^(?:checkbox|radio)$/i,
        Y = /<([\w:-]+)/,
        Z = /^$|\/(?:java|ecma)script/i,
        $ = { option: [1, "<select multiple='multiple'>", "</select>"], thead: [1, "<table>", "</table>"], col: [2, "<table><colgroup>", "</colgroup></table>"], tr: [2, "<table><tbody>", "</tbody></table>"], td: [3, "<table><tbody><tr>", "</tr></tbody></table>"], _default: [0, "", ""] };
    $.optgroup = $.option, $.tbody = $.tfoot = $.colgroup = $.caption = $.thead, $.th = $.td;

    function _(a, b) { var c = "undefined" != typeof a.getElementsByTagName ? a.getElementsByTagName(b || "*") : "undefined" != typeof a.querySelectorAll ? a.querySelectorAll(b || "*") : []; return void 0 === b || b && n.nodeName(a, b) ? n.merge([a], c) : c }

    function aa(a, b) { for (var c = 0, d = a.length; d > c; c++) N.set(a[c], "globalEval", !b || N.get(b[c], "globalEval")) }
    var ba = /<|&#?\w+;/;

    function ca(a, b, c, d, e) {
        for (var f, g, h, i, j, k, l = b.createDocumentFragment(), m = [], o = 0, p = a.length; p > o; o++)
            if (f = a[o], f || 0 === f)
                if ("object" === n.type(f)) n.merge(m, f.nodeType ? [f] : f);
                else if (ba.test(f)) {
            g = g || l.appendChild(b.createElement("div")), h = (Y.exec(f) || ["", ""])[1].toLowerCase(), i = $[h] || $._default, g.innerHTML = i[1] + n.htmlPrefilter(f) + i[2], k = i[0];
            while (k--) g = g.lastChild;
            n.merge(m, g.childNodes), g = l.firstChild, g.textContent = ""
        } else m.push(b.createTextNode(f));
        l.textContent = "", o = 0;
        while (f = m[o++])
            if (d && n.inArray(f, d) > -1) e && e.push(f);
            else if (j = n.contains(f.ownerDocument, f), g = _(l.appendChild(f), "script"), j && aa(g), c) { k = 0; while (f = g[k++]) Z.test(f.type || "") && c.push(f) }
        return l
    }! function() {
        var a = d.createDocumentFragment(),
            b = a.appendChild(d.createElement("div")),
            c = d.createElement("input");
        c.setAttribute("type", "radio"), c.setAttribute("checked", "checked"), c.setAttribute("name", "t"), b.appendChild(c), l.checkClone = b.cloneNode(!0).cloneNode(!0).lastChild.checked, b.innerHTML = "<textarea>x</textarea>", l.noCloneChecked = !!b.cloneNode(!0).lastChild.defaultValue
    }();
    var da = /^key/,
        ea = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
        fa = /^([^.]*)(?:\.(.+)|)/;

    function ga() { return !0 }

    function ha() { return !1 }

    function ia() { try { return d.activeElement } catch (a) {} }

    function ja(a, b, c, d, e, f) {
        var g, h;
        if ("object" == typeof b) { "string" != typeof c && (d = d || c, c = void 0); for (h in b) ja(a, h, c, d, b[h], f); return a }
        if (null == d && null == e ? (e = c, d = c = void 0) : null == e && ("string" == typeof c ? (e = d, d = void 0) : (e = d, d = c, c = void 0)), e === !1) e = ha;
        else if (!e) return a;
        return 1 === f && (g = e, e = function(a) { return n().off(a), g.apply(this, arguments) }, e.guid = g.guid || (g.guid = n.guid++)), a.each(function() { n.event.add(this, b, e, d, c) })
    }
    n.event = {
        global: {},
        add: function(a, b, c, d, e) { var f, g, h, i, j, k, l, m, o, p, q, r = N.get(a); if (r) { c.handler && (f = c, c = f.handler, e = f.selector), c.guid || (c.guid = n.guid++), (i = r.events) || (i = r.events = {}), (g = r.handle) || (g = r.handle = function(b) { return "undefined" != typeof n && n.event.triggered !== b.type ? n.event.dispatch.apply(a, arguments) : void 0 }), b = (b || "").match(G) || [""], j = b.length; while (j--) h = fa.exec(b[j]) || [], o = q = h[1], p = (h[2] || "").split(".").sort(), o && (l = n.event.special[o] || {}, o = (e ? l.delegateType : l.bindType) || o, l = n.event.special[o] || {}, k = n.extend({ type: o, origType: q, data: d, handler: c, guid: c.guid, selector: e, needsContext: e && n.expr.match.needsContext.test(e), namespace: p.join(".") }, f), (m = i[o]) || (m = i[o] = [], m.delegateCount = 0, l.setup && l.setup.call(a, d, p, g) !== !1 || a.addEventListener && a.addEventListener(o, g)), l.add && (l.add.call(a, k), k.handler.guid || (k.handler.guid = c.guid)), e ? m.splice(m.delegateCount++, 0, k) : m.push(k), n.event.global[o] = !0) } },
        remove: function(a, b, c, d, e) {
            var f, g, h, i, j, k, l, m, o, p, q, r = N.hasData(a) && N.get(a);
            if (r && (i = r.events)) {
                b = (b || "").match(G) || [""], j = b.length;
                while (j--)
                    if (h = fa.exec(b[j]) || [], o = q = h[1], p = (h[2] || "").split(".").sort(), o) {
                        l = n.event.special[o] || {}, o = (d ? l.delegateType : l.bindType) || o, m = i[o] || [], h = h[2] && new RegExp("(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)"), g = f = m.length;
                        while (f--) k = m[f], !e && q !== k.origType || c && c.guid !== k.guid || h && !h.test(k.namespace) || d && d !== k.selector && ("**" !== d || !k.selector) || (m.splice(f, 1), k.selector && m.delegateCount--, l.remove && l.remove.call(a, k));
                        g && !m.length && (l.teardown && l.teardown.call(a, p, r.handle) !== !1 || n.removeEvent(a, o, r.handle), delete i[o])
                    } else
                        for (o in i) n.event.remove(a, o + b[j], c, d, !0);
                n.isEmptyObject(i) && N.remove(a, "handle events")
            }
        },
        dispatch: function(a) {
            a = n.event.fix(a);
            var b, c, d, f, g, h = [],
                i = e.call(arguments),
                j = (N.get(this, "events") || {})[a.type] || [],
                k = n.event.special[a.type] || {};
            if (i[0] = a, a.delegateTarget = this, !k.preDispatch || k.preDispatch.call(this, a) !== !1) { h = n.event.handlers.call(this, a, j), b = 0; while ((f = h[b++]) && !a.isPropagationStopped()) { a.currentTarget = f.elem, c = 0; while ((g = f.handlers[c++]) && !a.isImmediatePropagationStopped()) a.rnamespace && !a.rnamespace.test(g.namespace) || (a.handleObj = g, a.data = g.data, d = ((n.event.special[g.origType] || {}).handle || g.handler).apply(f.elem, i), void 0 !== d && (a.result = d) === !1 && (a.preventDefault(), a.stopPropagation())) } return k.postDispatch && k.postDispatch.call(this, a), a.result }
        },
        handlers: function(a, b) {
            var c, d, e, f, g = [],
                h = b.delegateCount,
                i = a.target;
            if (h && i.nodeType && ("click" !== a.type || isNaN(a.button) || a.button < 1))
                for (; i !== this; i = i.parentNode || this)
                    if (1 === i.nodeType && (i.disabled !== !0 || "click" !== a.type)) {
                        for (d = [], c = 0; h > c; c++) f = b[c], e = f.selector + " ", void 0 === d[e] && (d[e] = f.needsContext ? n(e, this).index(i) > -1 : n.find(e, this, null, [i]).length), d[e] && d.push(f);
                        d.length && g.push({ elem: i, handlers: d })
                    }
            return h < b.length && g.push({ elem: this, handlers: b.slice(h) }), g
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget detail eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: { props: "char charCode key keyCode".split(" "), filter: function(a, b) { return null == a.which && (a.which = null != b.charCode ? b.charCode : b.keyCode), a } },
        mouseHooks: { props: "button buttons clientX clientY offsetX offsetY pageX pageY screenX screenY toElement".split(" "), filter: function(a, b) { var c, e, f, g = b.button; return null == a.pageX && null != b.clientX && (c = a.target.ownerDocument || d, e = c.documentElement, f = c.body, a.pageX = b.clientX + (e && e.scrollLeft || f && f.scrollLeft || 0) - (e && e.clientLeft || f && f.clientLeft || 0), a.pageY = b.clientY + (e && e.scrollTop || f && f.scrollTop || 0) - (e && e.clientTop || f && f.clientTop || 0)), a.which || void 0 === g || (a.which = 1 & g ? 1 : 2 & g ? 3 : 4 & g ? 2 : 0), a } },
        fix: function(a) {
            if (a[n.expando]) return a;
            var b, c, e, f = a.type,
                g = a,
                h = this.fixHooks[f];
            h || (this.fixHooks[f] = h = ea.test(f) ? this.mouseHooks : da.test(f) ? this.keyHooks : {}), e = h.props ? this.props.concat(h.props) : this.props, a = new n.Event(g), b = e.length;
            while (b--) c = e[b], a[c] = g[c];
            return a.target || (a.target = d), 3 === a.target.nodeType && (a.target = a.target.parentNode), h.filter ? h.filter(a, g) : a
        },
        special: { load: { noBubble: !0 }, focus: { trigger: function() { return this !== ia() && this.focus ? (this.focus(), !1) : void 0 }, delegateType: "focusin" }, blur: { trigger: function() { return this === ia() && this.blur ? (this.blur(), !1) : void 0 }, delegateType: "focusout" }, click: { trigger: function() { return "checkbox" === this.type && this.click && n.nodeName(this, "input") ? (this.click(), !1) : void 0 }, _default: function(a) { return n.nodeName(a.target, "a") } }, beforeunload: { postDispatch: function(a) { void 0 !== a.result && a.originalEvent && (a.originalEvent.returnValue = a.result) } } }
    }, n.removeEvent = function(a, b, c) { a.removeEventListener && a.removeEventListener(b, c) }, n.Event = function(a, b) { return this instanceof n.Event ? (a && a.type ? (this.originalEvent = a, this.type = a.type, this.isDefaultPrevented = a.defaultPrevented || void 0 === a.defaultPrevented && a.returnValue === !1 ? ga : ha) : this.type = a, b && n.extend(this, b), this.timeStamp = a && a.timeStamp || n.now(), void(this[n.expando] = !0)) : new n.Event(a, b) }, n.Event.prototype = {
        constructor: n.Event,
        isDefaultPrevented: ha,
        isPropagationStopped: ha,
        isImmediatePropagationStopped: ha,
        isSimulated: !1,
        preventDefault: function() {
            var a = this.originalEvent;
            this.isDefaultPrevented = ga, a && !this.isSimulated && a.preventDefault()
        },
        stopPropagation: function() {
            var a = this.originalEvent;
            this.isPropagationStopped = ga, a && !this.isSimulated && a.stopPropagation()
        },
        stopImmediatePropagation: function() {
            var a = this.originalEvent;
            this.isImmediatePropagationStopped = ga, a && !this.isSimulated && a.stopImmediatePropagation(), this.stopPropagation()
        }
    }, n.each({ mouseenter: "mouseover", mouseleave: "mouseout", pointerenter: "pointerover", pointerleave: "pointerout" }, function(a, b) {
        n.event.special[a] = {
            delegateType: b,
            bindType: b,
            handle: function(a) {
                var c, d = this,
                    e = a.relatedTarget,
                    f = a.handleObj;
                return e && (e === d || n.contains(d, e)) || (a.type = f.origType, c = f.handler.apply(this, arguments), a.type = b), c
            }
        }
    }), n.fn.extend({ on: function(a, b, c, d) { return ja(this, a, b, c, d) }, one: function(a, b, c, d) { return ja(this, a, b, c, d, 1) }, off: function(a, b, c) { var d, e; if (a && a.preventDefault && a.handleObj) return d = a.handleObj, n(a.delegateTarget).off(d.namespace ? d.origType + "." + d.namespace : d.origType, d.selector, d.handler), this; if ("object" == typeof a) { for (e in a) this.off(e, b, a[e]); return this } return b !== !1 && "function" != typeof b || (c = b, b = void 0), c === !1 && (c = ha), this.each(function() { n.event.remove(this, a, c, b) }) } });
    var ka = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:-]+)[^>]*)\/>/gi,
        la = /<script|<style|<link/i,
        ma = /checked\s*(?:[^=]|=\s*.checked.)/i,
        na = /^true\/(.*)/,
        oa = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

    function pa(a, b) { return n.nodeName(a, "table") && n.nodeName(11 !== b.nodeType ? b : b.firstChild, "tr") ? a.getElementsByTagName("tbody")[0] || a.appendChild(a.ownerDocument.createElement("tbody")) : a }

    function qa(a) { return a.type = (null !== a.getAttribute("type")) + "/" + a.type, a }

    function ra(a) { var b = na.exec(a.type); return b ? a.type = b[1] : a.removeAttribute("type"), a }

    function sa(a, b) {
        var c, d, e, f, g, h, i, j;
        if (1 === b.nodeType) {
            if (N.hasData(a) && (f = N.access(a), g = N.set(b, f), j = f.events)) {
                delete g.handle, g.events = {};
                for (e in j)
                    for (c = 0, d = j[e].length; d > c; c++) n.event.add(b, e, j[e][c])
            }
            O.hasData(a) && (h = O.access(a), i = n.extend({}, h), O.set(b, i))
        }
    }

    function ta(a, b) { var c = b.nodeName.toLowerCase(); "input" === c && X.test(a.type) ? b.checked = a.checked : "input" !== c && "textarea" !== c || (b.defaultValue = a.defaultValue) }

    function ua(a, b, c, d) {
        b = f.apply([], b);
        var e, g, h, i, j, k, m = 0,
            o = a.length,
            p = o - 1,
            q = b[0],
            r = n.isFunction(q);
        if (r || o > 1 && "string" == typeof q && !l.checkClone && ma.test(q)) return a.each(function(e) {
            var f = a.eq(e);
            r && (b[0] = q.call(this, e, f.html())), ua(f, b, c, d)
        });
        if (o && (e = ca(b, a[0].ownerDocument, !1, a, d), g = e.firstChild, 1 === e.childNodes.length && (e = g), g || d)) {
            for (h = n.map(_(e, "script"), qa), i = h.length; o > m; m++) j = e, m !== p && (j = n.clone(j, !0, !0), i && n.merge(h, _(j, "script"))), c.call(a[m], j, m);
            if (i)
                for (k = h[h.length - 1].ownerDocument, n.map(h, ra), m = 0; i > m; m++) j = h[m], Z.test(j.type || "") && !N.access(j, "globalEval") && n.contains(k, j) && (j.src ? n._evalUrl && n._evalUrl(j.src) : n.globalEval(j.textContent.replace(oa, "")))
        }
        return a
    }

    function va(a, b, c) { for (var d, e = b ? n.filter(b, a) : a, f = 0; null != (d = e[f]); f++) c || 1 !== d.nodeType || n.cleanData(_(d)), d.parentNode && (c && n.contains(d.ownerDocument, d) && aa(_(d, "script")), d.parentNode.removeChild(d)); return a }
    n.extend({
        htmlPrefilter: function(a) { return a.replace(ka, "<$1></$2>") },
        clone: function(a, b, c) {
            var d, e, f, g, h = a.cloneNode(!0),
                i = n.contains(a.ownerDocument, a);
            if (!(l.noCloneChecked || 1 !== a.nodeType && 11 !== a.nodeType || n.isXMLDoc(a)))
                for (g = _(h), f = _(a), d = 0, e = f.length; e > d; d++) ta(f[d], g[d]);
            if (b)
                if (c)
                    for (f = f || _(a), g = g || _(h), d = 0, e = f.length; e > d; d++) sa(f[d], g[d]);
                else sa(a, h);
            return g = _(h, "script"), g.length > 0 && aa(g, !i && _(a, "script")), h
        },
        cleanData: function(a) {
            for (var b, c, d, e = n.event.special, f = 0; void 0 !== (c = a[f]); f++)
                if (L(c)) {
                    if (b = c[N.expando]) {
                        if (b.events)
                            for (d in b.events) e[d] ? n.event.remove(c, d) : n.removeEvent(c, d, b.handle);
                        c[N.expando] = void 0
                    }
                    c[O.expando] && (c[O.expando] = void 0)
                }
        }
    }), n.fn.extend({
        domManip: ua,
        detach: function(a) { return va(this, a, !0) },
        remove: function(a) { return va(this, a) },
        text: function(a) { return K(this, function(a) { return void 0 === a ? n.text(this) : this.empty().each(function() { 1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = a) }) }, null, a, arguments.length) },
        append: function() {
            return ua(this, arguments, function(a) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var b = pa(this, a);
                    b.appendChild(a)
                }
            })
        },
        prepend: function() {
            return ua(this, arguments, function(a) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var b = pa(this, a);
                    b.insertBefore(a, b.firstChild)
                }
            })
        },
        before: function() { return ua(this, arguments, function(a) { this.parentNode && this.parentNode.insertBefore(a, this) }) },
        after: function() { return ua(this, arguments, function(a) { this.parentNode && this.parentNode.insertBefore(a, this.nextSibling) }) },
        empty: function() { for (var a, b = 0; null != (a = this[b]); b++) 1 === a.nodeType && (n.cleanData(_(a, !1)), a.textContent = ""); return this },
        clone: function(a, b) { return a = null == a ? !1 : a, b = null == b ? a : b, this.map(function() { return n.clone(this, a, b) }) },
        html: function(a) {
            return K(this, function(a) {
                var b = this[0] || {},
                    c = 0,
                    d = this.length;
                if (void 0 === a && 1 === b.nodeType) return b.innerHTML;
                if ("string" == typeof a && !la.test(a) && !$[(Y.exec(a) || ["", ""])[1].toLowerCase()]) {
                    a = n.htmlPrefilter(a);
                    try {
                        for (; d > c; c++) b = this[c] || {}, 1 === b.nodeType && (n.cleanData(_(b, !1)), b.innerHTML = a);
                        b = 0
                    } catch (e) {}
                }
                b && this.empty().append(a)
            }, null, a, arguments.length)
        },
        replaceWith: function() {
            var a = [];
            return ua(this, arguments, function(b) {
                var c = this.parentNode;
                n.inArray(this, a) < 0 && (n.cleanData(_(this)), c && c.replaceChild(b, this))
            }, a)
        }
    }), n.each({ appendTo: "append", prependTo: "prepend", insertBefore: "before", insertAfter: "after", replaceAll: "replaceWith" }, function(a, b) { n.fn[a] = function(a) { for (var c, d = [], e = n(a), f = e.length - 1, h = 0; f >= h; h++) c = h === f ? this : this.clone(!0), n(e[h])[b](c), g.apply(d, c.get()); return this.pushStack(d) } });
    var wa, xa = { HTML: "block", BODY: "block" };

    function ya(a, b) {
        var c = n(b.createElement(a)).appendTo(b.body),
            d = n.css(c[0], "display");
        return c.detach(), d
    }

    function za(a) {
        var b = d,
            c = xa[a];
        return c || (c = ya(a, b), "none" !== c && c || (wa = (wa || n("<iframe frameborder='0' width='0' height='0'/>")).appendTo(b.documentElement), b = wa[0].contentDocument, b.write(), b.close(), c = ya(a, b), wa.detach()), xa[a] = c), c
    }
    var Aa = /^margin/,
        Ba = new RegExp("^(" + S + ")(?!px)[a-z%]+$", "i"),
        Ca = function(b) { var c = b.ownerDocument.defaultView; return c && c.opener || (c = a), c.getComputedStyle(b) },
        Da = function(a, b, c, d) {
            var e, f, g = {};
            for (f in b) g[f] = a.style[f], a.style[f] = b[f];
            e = c.apply(a, d || []);
            for (f in b) a.style[f] = g[f];
            return e
        },
        Ea = d.documentElement;
    ! function() {
        var b, c, e, f, g = d.createElement("div"),
            h = d.createElement("div");
        if (h.style) {
            h.style.backgroundClip = "content-box", h.cloneNode(!0).style.backgroundClip = "", l.clearCloneStyle = "content-box" === h.style.backgroundClip, g.style.cssText = "border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute", g.appendChild(h);

            function i() {
                h.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%", h.innerHTML = "", Ea.appendChild(g);
                var d = a.getComputedStyle(h);
                b = "1%" !== d.top, f = "2px" === d.marginLeft, c = "4px" === d.width, h.style.marginRight = "50%", e = "4px" === d.marginRight, Ea.removeChild(g)
            }
            n.extend(l, { pixelPosition: function() { return i(), b }, boxSizingReliable: function() { return null == c && i(), c }, pixelMarginRight: function() { return null == c && i(), e }, reliableMarginLeft: function() { return null == c && i(), f }, reliableMarginRight: function() { var b, c = h.appendChild(d.createElement("div")); return c.style.cssText = h.style.cssText = "-webkit-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0", c.style.marginRight = c.style.width = "0", h.style.width = "1px", Ea.appendChild(g), b = !parseFloat(a.getComputedStyle(c).marginRight), Ea.removeChild(g), h.removeChild(c), b } })
        }
    }();

    function Fa(a, b, c) { var d, e, f, g, h = a.style; return c = c || Ca(a), g = c ? c.getPropertyValue(b) || c[b] : void 0, "" !== g && void 0 !== g || n.contains(a.ownerDocument, a) || (g = n.style(a, b)), c && !l.pixelMarginRight() && Ba.test(g) && Aa.test(b) && (d = h.width, e = h.minWidth, f = h.maxWidth, h.minWidth = h.maxWidth = h.width = g, g = c.width, h.width = d, h.minWidth = e, h.maxWidth = f), void 0 !== g ? g + "" : g }

    function Ga(a, b) { return { get: function() { return a() ? void delete this.get : (this.get = b).apply(this, arguments) } } }
    var Ha = /^(none|table(?!-c[ea]).+)/,
        Ia = { position: "absolute", visibility: "hidden", display: "block" },
        Ja = { letterSpacing: "0", fontWeight: "400" },
        Ka = ["Webkit", "O", "Moz", "ms"],
        La = d.createElement("div").style;

    function Ma(a) {
        if (a in La) return a;
        var b = a[0].toUpperCase() + a.slice(1),
            c = Ka.length;
        while (c--)
            if (a = Ka[c] + b, a in La) return a
    }

    function Na(a, b, c) { var d = T.exec(b); return d ? Math.max(0, d[2] - (c || 0)) + (d[3] || "px") : b }

    function Oa(a, b, c, d, e) { for (var f = c === (d ? "border" : "content") ? 4 : "width" === b ? 1 : 0, g = 0; 4 > f; f += 2) "margin" === c && (g += n.css(a, c + U[f], !0, e)), d ? ("content" === c && (g -= n.css(a, "padding" + U[f], !0, e)), "margin" !== c && (g -= n.css(a, "border" + U[f] + "Width", !0, e))) : (g += n.css(a, "padding" + U[f], !0, e), "padding" !== c && (g += n.css(a, "border" + U[f] + "Width", !0, e))); return g }

    function Pa(a, b, c) {
        var d = !0,
            e = "width" === b ? a.offsetWidth : a.offsetHeight,
            f = Ca(a),
            g = "border-box" === n.css(a, "boxSizing", !1, f);
        if (0 >= e || null == e) {
            if (e = Fa(a, b, f), (0 > e || null == e) && (e = a.style[b]), Ba.test(e)) return e;
            d = g && (l.boxSizingReliable() || e === a.style[b]), e = parseFloat(e) || 0
        }
        return e + Oa(a, b, c || (g ? "border" : "content"), d, f) + "px"
    }

    function Qa(a, b) { for (var c, d, e, f = [], g = 0, h = a.length; h > g; g++) d = a[g], d.style && (f[g] = N.get(d, "olddisplay"), c = d.style.display, b ? (f[g] || "none" !== c || (d.style.display = ""), "" === d.style.display && V(d) && (f[g] = N.access(d, "olddisplay", za(d.nodeName)))) : (e = V(d), "none" === c && e || N.set(d, "olddisplay", e ? c : n.css(d, "display")))); for (g = 0; h > g; g++) d = a[g], d.style && (b && "none" !== d.style.display && "" !== d.style.display || (d.style.display = b ? f[g] || "" : "none")); return a }
    n.extend({
        cssHooks: { opacity: { get: function(a, b) { if (b) { var c = Fa(a, "opacity"); return "" === c ? "1" : c } } } },
        cssNumber: { animationIterationCount: !0, columnCount: !0, fillOpacity: !0, flexGrow: !0, flexShrink: !0, fontWeight: !0, lineHeight: !0, opacity: !0, order: !0, orphans: !0, widows: !0, zIndex: !0, zoom: !0 },
        cssProps: { "float": "cssFloat" },
        style: function(a, b, c, d) {
            if (a && 3 !== a.nodeType && 8 !== a.nodeType && a.style) {
                var e, f, g, h = n.camelCase(b),
                    i = a.style;
                return b = n.cssProps[h] || (n.cssProps[h] = Ma(h) || h), g = n.cssHooks[b] || n.cssHooks[h], void 0 === c ? g && "get" in g && void 0 !== (e = g.get(a, !1, d)) ? e : i[b] : (f = typeof c, "string" === f && (e = T.exec(c)) && e[1] && (c = W(a, b, e), f = "number"), null != c && c === c && ("number" === f && (c += e && e[3] || (n.cssNumber[h] ? "" : "px")), l.clearCloneStyle || "" !== c || 0 !== b.indexOf("background") || (i[b] = "inherit"), g && "set" in g && void 0 === (c = g.set(a, c, d)) || (i[b] = c)), void 0)
            }
        },
        css: function(a, b, c, d) { var e, f, g, h = n.camelCase(b); return b = n.cssProps[h] || (n.cssProps[h] = Ma(h) || h), g = n.cssHooks[b] || n.cssHooks[h], g && "get" in g && (e = g.get(a, !0, c)), void 0 === e && (e = Fa(a, b, d)), "normal" === e && b in Ja && (e = Ja[b]), "" === c || c ? (f = parseFloat(e), c === !0 || isFinite(f) ? f || 0 : e) : e }
    }), n.each(["height", "width"], function(a, b) {
        n.cssHooks[b] = {
            get: function(a, c, d) { return c ? Ha.test(n.css(a, "display")) && 0 === a.offsetWidth ? Da(a, Ia, function() { return Pa(a, b, d) }) : Pa(a, b, d) : void 0 },
            set: function(a, c, d) {
                var e, f = d && Ca(a),
                    g = d && Oa(a, b, d, "border-box" === n.css(a, "boxSizing", !1, f), f);
                return g && (e = T.exec(c)) && "px" !== (e[3] || "px") && (a.style[b] = c, c = n.css(a, b)), Na(a, c, g)
            }
        }
    }), n.cssHooks.marginLeft = Ga(l.reliableMarginLeft, function(a, b) { return b ? (parseFloat(Fa(a, "marginLeft")) || a.getBoundingClientRect().left - Da(a, { marginLeft: 0 }, function() { return a.getBoundingClientRect().left })) + "px" : void 0 }), n.cssHooks.marginRight = Ga(l.reliableMarginRight, function(a, b) { return b ? Da(a, { display: "inline-block" }, Fa, [a, "marginRight"]) : void 0 }), n.each({ margin: "", padding: "", border: "Width" }, function(a, b) { n.cssHooks[a + b] = { expand: function(c) { for (var d = 0, e = {}, f = "string" == typeof c ? c.split(" ") : [c]; 4 > d; d++) e[a + U[d] + b] = f[d] || f[d - 2] || f[0]; return e } }, Aa.test(a) || (n.cssHooks[a + b].set = Na) }), n.fn.extend({
        css: function(a, b) {
            return K(this, function(a, b, c) {
                var d, e, f = {},
                    g = 0;
                if (n.isArray(b)) { for (d = Ca(a), e = b.length; e > g; g++) f[b[g]] = n.css(a, b[g], !1, d); return f }
                return void 0 !== c ? n.style(a, b, c) : n.css(a, b)
            }, a, b, arguments.length > 1)
        },
        show: function() { return Qa(this, !0) },
        hide: function() { return Qa(this) },
        toggle: function(a) { return "boolean" == typeof a ? a ? this.show() : this.hide() : this.each(function() { V(this) ? n(this).show() : n(this).hide() }) }
    });

    function Ra(a, b, c, d, e) { return new Ra.prototype.init(a, b, c, d, e) }
    n.Tween = Ra, Ra.prototype = { constructor: Ra, init: function(a, b, c, d, e, f) { this.elem = a, this.prop = c, this.easing = e || n.easing._default, this.options = b, this.start = this.now = this.cur(), this.end = d, this.unit = f || (n.cssNumber[c] ? "" : "px") }, cur: function() { var a = Ra.propHooks[this.prop]; return a && a.get ? a.get(this) : Ra.propHooks._default.get(this) }, run: function(a) { var b, c = Ra.propHooks[this.prop]; return this.options.duration ? this.pos = b = n.easing[this.easing](a, this.options.duration * a, 0, 1, this.options.duration) : this.pos = b = a, this.now = (this.end - this.start) * b + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), c && c.set ? c.set(this) : Ra.propHooks._default.set(this), this } }, Ra.prototype.init.prototype = Ra.prototype, Ra.propHooks = { _default: { get: function(a) { var b; return 1 !== a.elem.nodeType || null != a.elem[a.prop] && null == a.elem.style[a.prop] ? a.elem[a.prop] : (b = n.css(a.elem, a.prop, ""), b && "auto" !== b ? b : 0) }, set: function(a) { n.fx.step[a.prop] ? n.fx.step[a.prop](a) : 1 !== a.elem.nodeType || null == a.elem.style[n.cssProps[a.prop]] && !n.cssHooks[a.prop] ? a.elem[a.prop] = a.now : n.style(a.elem, a.prop, a.now + a.unit) } } }, Ra.propHooks.scrollTop = Ra.propHooks.scrollLeft = { set: function(a) { a.elem.nodeType && a.elem.parentNode && (a.elem[a.prop] = a.now) } }, n.easing = { linear: function(a) { return a }, swing: function(a) { return .5 - Math.cos(a * Math.PI) / 2 }, _default: "swing" }, n.fx = Ra.prototype.init, n.fx.step = {};
    var Sa, Ta, Ua = /^(?:toggle|show|hide)$/,
        Va = /queueHooks$/;

    function Wa() { return a.setTimeout(function() { Sa = void 0 }), Sa = n.now() }

    function Xa(a, b) {
        var c, d = 0,
            e = { height: a };
        for (b = b ? 1 : 0; 4 > d; d += 2 - b) c = U[d], e["margin" + c] = e["padding" + c] = a;
        return b && (e.opacity = e.width = a), e
    }

    function Ya(a, b, c) {
        for (var d, e = (_a.tweeners[b] || []).concat(_a.tweeners["*"]), f = 0, g = e.length; g > f; f++)
            if (d = e[f].call(c, b, a)) return d
    }

    function Za(a, b, c) {
        var d, e, f, g, h, i, j, k, l = this,
            m = {},
            o = a.style,
            p = a.nodeType && V(a),
            q = N.get(a, "fxshow");
        c.queue || (h = n._queueHooks(a, "fx"), null == h.unqueued && (h.unqueued = 0, i = h.empty.fire, h.empty.fire = function() { h.unqueued || i() }), h.unqueued++, l.always(function() { l.always(function() { h.unqueued--, n.queue(a, "fx").length || h.empty.fire() }) })), 1 === a.nodeType && ("height" in b || "width" in b) && (c.overflow = [o.overflow, o.overflowX, o.overflowY], j = n.css(a, "display"), k = "none" === j ? N.get(a, "olddisplay") || za(a.nodeName) : j, "inline" === k && "none" === n.css(a, "float") && (o.display = "inline-block")), c.overflow && (o.overflow = "hidden", l.always(function() { o.overflow = c.overflow[0], o.overflowX = c.overflow[1], o.overflowY = c.overflow[2] }));
        for (d in b)
            if (e = b[d], Ua.exec(e)) {
                if (delete b[d], f = f || "toggle" === e, e === (p ? "hide" : "show")) {
                    if ("show" !== e || !q || void 0 === q[d]) continue;
                    p = !0
                }
                m[d] = q && q[d] || n.style(a, d)
            } else j = void 0;
        if (n.isEmptyObject(m)) "inline" === ("none" === j ? za(a.nodeName) : j) && (o.display = j);
        else {
            q ? "hidden" in q && (p = q.hidden) : q = N.access(a, "fxshow", {}), f && (q.hidden = !p), p ? n(a).show() : l.done(function() { n(a).hide() }), l.done(function() {
                var b;
                N.remove(a, "fxshow");
                for (b in m) n.style(a, b, m[b])
            });
            for (d in m) g = Ya(p ? q[d] : 0, d, l), d in q || (q[d] = g.start, p && (g.end = g.start, g.start = "width" === d || "height" === d ? 1 : 0))
        }
    }

    function $a(a, b) {
        var c, d, e, f, g;
        for (c in a)
            if (d = n.camelCase(c), e = b[d], f = a[c], n.isArray(f) && (e = f[1], f = a[c] = f[0]), c !== d && (a[d] = f, delete a[c]), g = n.cssHooks[d], g && "expand" in g) { f = g.expand(f), delete a[d]; for (c in f) c in a || (a[c] = f[c], b[c] = e) } else b[d] = e
    }

    function _a(a, b, c) {
        var d, e, f = 0,
            g = _a.prefilters.length,
            h = n.Deferred().always(function() { delete i.elem }),
            i = function() { if (e) return !1; for (var b = Sa || Wa(), c = Math.max(0, j.startTime + j.duration - b), d = c / j.duration || 0, f = 1 - d, g = 0, i = j.tweens.length; i > g; g++) j.tweens[g].run(f); return h.notifyWith(a, [j, f, c]), 1 > f && i ? c : (h.resolveWith(a, [j]), !1) },
            j = h.promise({
                elem: a,
                props: n.extend({}, b),
                opts: n.extend(!0, { specialEasing: {}, easing: n.easing._default }, c),
                originalProperties: b,
                originalOptions: c,
                startTime: Sa || Wa(),
                duration: c.duration,
                tweens: [],
                createTween: function(b, c) { var d = n.Tween(a, j.opts, b, c, j.opts.specialEasing[b] || j.opts.easing); return j.tweens.push(d), d },
                stop: function(b) {
                    var c = 0,
                        d = b ? j.tweens.length : 0;
                    if (e) return this;
                    for (e = !0; d > c; c++) j.tweens[c].run(1);
                    return b ? (h.notifyWith(a, [j, 1, 0]), h.resolveWith(a, [j, b])) : h.rejectWith(a, [j, b]), this
                }
            }),
            k = j.props;
        for ($a(k, j.opts.specialEasing); g > f; f++)
            if (d = _a.prefilters[f].call(j, a, k, j.opts)) return n.isFunction(d.stop) && (n._queueHooks(j.elem, j.opts.queue).stop = n.proxy(d.stop, d)), d;
        return n.map(k, Ya, j), n.isFunction(j.opts.start) && j.opts.start.call(a, j), n.fx.timer(n.extend(i, { elem: a, anim: j, queue: j.opts.queue })), j.progress(j.opts.progress).done(j.opts.done, j.opts.complete).fail(j.opts.fail).always(j.opts.always)
    }
    n.Animation = n.extend(_a, { tweeners: { "*": [function(a, b) { var c = this.createTween(a, b); return W(c.elem, a, T.exec(b), c), c }] }, tweener: function(a, b) { n.isFunction(a) ? (b = a, a = ["*"]) : a = a.match(G); for (var c, d = 0, e = a.length; e > d; d++) c = a[d], _a.tweeners[c] = _a.tweeners[c] || [], _a.tweeners[c].unshift(b) }, prefilters: [Za], prefilter: function(a, b) { b ? _a.prefilters.unshift(a) : _a.prefilters.push(a) } }), n.speed = function(a, b, c) { var d = a && "object" == typeof a ? n.extend({}, a) : { complete: c || !c && b || n.isFunction(a) && a, duration: a, easing: c && b || b && !n.isFunction(b) && b }; return d.duration = n.fx.off ? 0 : "number" == typeof d.duration ? d.duration : d.duration in n.fx.speeds ? n.fx.speeds[d.duration] : n.fx.speeds._default, null != d.queue && d.queue !== !0 || (d.queue = "fx"), d.old = d.complete, d.complete = function() { n.isFunction(d.old) && d.old.call(this), d.queue && n.dequeue(this, d.queue) }, d }, n.fn.extend({
            fadeTo: function(a, b, c, d) { return this.filter(V).css("opacity", 0).show().end().animate({ opacity: b }, a, c, d) },
            animate: function(a, b, c, d) {
                var e = n.isEmptyObject(a),
                    f = n.speed(b, c, d),
                    g = function() {
                        var b = _a(this, n.extend({}, a), f);
                        (e || N.get(this, "finish")) && b.stop(!0)
                    };
                return g.finish = g, e || f.queue === !1 ? this.each(g) : this.queue(f.queue, g)
            },
            stop: function(a, b, c) {
                var d = function(a) {
                    var b = a.stop;
                    delete a.stop, b(c)
                };
                return "string" != typeof a && (c = b, b = a, a = void 0), b && a !== !1 && this.queue(a || "fx", []), this.each(function() {
                    var b = !0,
                        e = null != a && a + "queueHooks",
                        f = n.timers,
                        g = N.get(this);
                    if (e) g[e] && g[e].stop && d(g[e]);
                    else
                        for (e in g) g[e] && g[e].stop && Va.test(e) && d(g[e]);
                    for (e = f.length; e--;) f[e].elem !== this || null != a && f[e].queue !== a || (f[e].anim.stop(c), b = !1, f.splice(e, 1));
                    !b && c || n.dequeue(this, a)
                })
            },
            finish: function(a) {
                return a !== !1 && (a = a || "fx"), this.each(function() {
                    var b, c = N.get(this),
                        d = c[a + "queue"],
                        e = c[a + "queueHooks"],
                        f = n.timers,
                        g = d ? d.length : 0;
                    for (c.finish = !0, n.queue(this, a, []), e && e.stop && e.stop.call(this, !0), b = f.length; b--;) f[b].elem === this && f[b].queue === a && (f[b].anim.stop(!0), f.splice(b, 1));
                    for (b = 0; g > b; b++) d[b] && d[b].finish && d[b].finish.call(this);
                    delete c.finish
                })
            }
        }), n.each(["toggle", "show", "hide"], function(a, b) {
            var c = n.fn[b];
            n.fn[b] = function(a, d, e) { return null == a || "boolean" == typeof a ? c.apply(this, arguments) : this.animate(Xa(b, !0), a, d, e) }
        }), n.each({ slideDown: Xa("show"), slideUp: Xa("hide"), slideToggle: Xa("toggle"), fadeIn: { opacity: "show" }, fadeOut: { opacity: "hide" }, fadeToggle: { opacity: "toggle" } }, function(a, b) { n.fn[a] = function(a, c, d) { return this.animate(b, a, c, d) } }), n.timers = [], n.fx.tick = function() {
            var a, b = 0,
                c = n.timers;
            for (Sa = n.now(); b < c.length; b++) a = c[b], a() || c[b] !== a || c.splice(b--, 1);
            c.length || n.fx.stop(), Sa = void 0
        }, n.fx.timer = function(a) { n.timers.push(a), a() ? n.fx.start() : n.timers.pop() }, n.fx.interval = 13, n.fx.start = function() { Ta || (Ta = a.setInterval(n.fx.tick, n.fx.interval)) }, n.fx.stop = function() { a.clearInterval(Ta), Ta = null }, n.fx.speeds = { slow: 600, fast: 200, _default: 400 }, n.fn.delay = function(b, c) {
            return b = n.fx ? n.fx.speeds[b] || b : b, c = c || "fx", this.queue(c, function(c, d) {
                var e = a.setTimeout(c, b);
                d.stop = function() { a.clearTimeout(e) }
            })
        },
        function() {
            var a = d.createElement("input"),
                b = d.createElement("select"),
                c = b.appendChild(d.createElement("option"));
            a.type = "checkbox", l.checkOn = "" !== a.value, l.optSelected = c.selected, b.disabled = !0, l.optDisabled = !c.disabled, a = d.createElement("input"), a.value = "t", a.type = "radio", l.radioValue = "t" === a.value
        }();
    var ab, bb = n.expr.attrHandle;
    n.fn.extend({ attr: function(a, b) { return K(this, n.attr, a, b, arguments.length > 1) }, removeAttr: function(a) { return this.each(function() { n.removeAttr(this, a) }) } }), n.extend({
        attr: function(a, b, c) { var d, e, f = a.nodeType; if (3 !== f && 8 !== f && 2 !== f) return "undefined" == typeof a.getAttribute ? n.prop(a, b, c) : (1 === f && n.isXMLDoc(a) || (b = b.toLowerCase(), e = n.attrHooks[b] || (n.expr.match.bool.test(b) ? ab : void 0)), void 0 !== c ? null === c ? void n.removeAttr(a, b) : e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : (a.setAttribute(b, c + ""), c) : e && "get" in e && null !== (d = e.get(a, b)) ? d : (d = n.find.attr(a, b), null == d ? void 0 : d)) },
        attrHooks: { type: { set: function(a, b) { if (!l.radioValue && "radio" === b && n.nodeName(a, "input")) { var c = a.value; return a.setAttribute("type", b), c && (a.value = c), b } } } },
        removeAttr: function(a, b) {
            var c, d, e = 0,
                f = b && b.match(G);
            if (f && 1 === a.nodeType)
                while (c = f[e++]) d = n.propFix[c] || c, n.expr.match.bool.test(c) && (a[d] = !1), a.removeAttribute(c)
        }
    }), ab = { set: function(a, b, c) { return b === !1 ? n.removeAttr(a, c) : a.setAttribute(c, c), c } }, n.each(n.expr.match.bool.source.match(/\w+/g), function(a, b) {
        var c = bb[b] || n.find.attr;
        bb[b] = function(a, b, d) { var e, f; return d || (f = bb[b], bb[b] = e, e = null != c(a, b, d) ? b.toLowerCase() : null, bb[b] = f), e }
    });
    var cb = /^(?:input|select|textarea|button)$/i,
        db = /^(?:a|area)$/i;
    n.fn.extend({ prop: function(a, b) { return K(this, n.prop, a, b, arguments.length > 1) }, removeProp: function(a) { return this.each(function() { delete this[n.propFix[a] || a] }) } }), n.extend({
        prop: function(a, b, c) {
            var d, e, f = a.nodeType;
            if (3 !== f && 8 !== f && 2 !== f) return 1 === f && n.isXMLDoc(a) || (b = n.propFix[b] || b, e = n.propHooks[b]),
                void 0 !== c ? e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : a[b] = c : e && "get" in e && null !== (d = e.get(a, b)) ? d : a[b]
        },
        propHooks: { tabIndex: { get: function(a) { var b = n.find.attr(a, "tabindex"); return b ? parseInt(b, 10) : cb.test(a.nodeName) || db.test(a.nodeName) && a.href ? 0 : -1 } } },
        propFix: { "for": "htmlFor", "class": "className" }
    }), l.optSelected || (n.propHooks.selected = {
        get: function(a) { var b = a.parentNode; return b && b.parentNode && b.parentNode.selectedIndex, null },
        set: function(a) {
            var b = a.parentNode;
            b && (b.selectedIndex, b.parentNode && b.parentNode.selectedIndex)
        }
    }), n.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() { n.propFix[this.toLowerCase()] = this });
    var eb = /[\t\r\n\f]/g;

    function fb(a) { return a.getAttribute && a.getAttribute("class") || "" }
    n.fn.extend({
        addClass: function(a) {
            var b, c, d, e, f, g, h, i = 0;
            if (n.isFunction(a)) return this.each(function(b) { n(this).addClass(a.call(this, b, fb(this))) });
            if ("string" == typeof a && a) {
                b = a.match(G) || [];
                while (c = this[i++])
                    if (e = fb(c), d = 1 === c.nodeType && (" " + e + " ").replace(eb, " ")) {
                        g = 0;
                        while (f = b[g++]) d.indexOf(" " + f + " ") < 0 && (d += f + " ");
                        h = n.trim(d), e !== h && c.setAttribute("class", h)
                    }
            }
            return this
        },
        removeClass: function(a) {
            var b, c, d, e, f, g, h, i = 0;
            if (n.isFunction(a)) return this.each(function(b) { n(this).removeClass(a.call(this, b, fb(this))) });
            if (!arguments.length) return this.attr("class", "");
            if ("string" == typeof a && a) {
                b = a.match(G) || [];
                while (c = this[i++])
                    if (e = fb(c), d = 1 === c.nodeType && (" " + e + " ").replace(eb, " ")) {
                        g = 0;
                        while (f = b[g++])
                            while (d.indexOf(" " + f + " ") > -1) d = d.replace(" " + f + " ", " ");
                        h = n.trim(d), e !== h && c.setAttribute("class", h)
                    }
            }
            return this
        },
        toggleClass: function(a, b) { var c = typeof a; return "boolean" == typeof b && "string" === c ? b ? this.addClass(a) : this.removeClass(a) : n.isFunction(a) ? this.each(function(c) { n(this).toggleClass(a.call(this, c, fb(this), b), b) }) : this.each(function() { var b, d, e, f; if ("string" === c) { d = 0, e = n(this), f = a.match(G) || []; while (b = f[d++]) e.hasClass(b) ? e.removeClass(b) : e.addClass(b) } else void 0 !== a && "boolean" !== c || (b = fb(this), b && N.set(this, "__className__", b), this.setAttribute && this.setAttribute("class", b || a === !1 ? "" : N.get(this, "__className__") || "")) }) },
        hasClass: function(a) {
            var b, c, d = 0;
            b = " " + a + " ";
            while (c = this[d++])
                if (1 === c.nodeType && (" " + fb(c) + " ").replace(eb, " ").indexOf(b) > -1) return !0;
            return !1
        }
    });
    var gb = /\r/g,
        hb = /[\x20\t\r\n\f]+/g;
    n.fn.extend({
        val: function(a) {
            var b, c, d, e = this[0]; {
                if (arguments.length) return d = n.isFunction(a), this.each(function(c) {
                    var e;
                    1 === this.nodeType && (e = d ? a.call(this, c, n(this).val()) : a, null == e ? e = "" : "number" == typeof e ? e += "" : n.isArray(e) && (e = n.map(e, function(a) { return null == a ? "" : a + "" })), b = n.valHooks[this.type] || n.valHooks[this.nodeName.toLowerCase()], b && "set" in b && void 0 !== b.set(this, e, "value") || (this.value = e))
                });
                if (e) return b = n.valHooks[e.type] || n.valHooks[e.nodeName.toLowerCase()], b && "get" in b && void 0 !== (c = b.get(e, "value")) ? c : (c = e.value, "string" == typeof c ? c.replace(gb, "") : null == c ? "" : c)
            }
        }
    }), n.extend({
        valHooks: {
            option: { get: function(a) { var b = n.find.attr(a, "value"); return null != b ? b : n.trim(n.text(a)).replace(hb, " ") } },
            select: {
                get: function(a) {
                    for (var b, c, d = a.options, e = a.selectedIndex, f = "select-one" === a.type || 0 > e, g = f ? null : [], h = f ? e + 1 : d.length, i = 0 > e ? h : f ? e : 0; h > i; i++)
                        if (c = d[i], (c.selected || i === e) && (l.optDisabled ? !c.disabled : null === c.getAttribute("disabled")) && (!c.parentNode.disabled || !n.nodeName(c.parentNode, "optgroup"))) {
                            if (b = n(c).val(), f) return b;
                            g.push(b)
                        }
                    return g
                },
                set: function(a, b) {
                    var c, d, e = a.options,
                        f = n.makeArray(b),
                        g = e.length;
                    while (g--) d = e[g], (d.selected = n.inArray(n.valHooks.option.get(d), f) > -1) && (c = !0);
                    return c || (a.selectedIndex = -1), f
                }
            }
        }
    }), n.each(["radio", "checkbox"], function() { n.valHooks[this] = { set: function(a, b) { return n.isArray(b) ? a.checked = n.inArray(n(a).val(), b) > -1 : void 0 } }, l.checkOn || (n.valHooks[this].get = function(a) { return null === a.getAttribute("value") ? "on" : a.value }) });
    var ib = /^(?:focusinfocus|focusoutblur)$/;
    n.extend(n.event, {
        trigger: function(b, c, e, f) {
            var g, h, i, j, l, m, o, p = [e || d],
                q = k.call(b, "type") ? b.type : b,
                r = k.call(b, "namespace") ? b.namespace.split(".") : [];
            if (h = i = e = e || d, 3 !== e.nodeType && 8 !== e.nodeType && !ib.test(q + n.event.triggered) && (q.indexOf(".") > -1 && (r = q.split("."), q = r.shift(), r.sort()), l = q.indexOf(":") < 0 && "on" + q, b = b[n.expando] ? b : new n.Event(q, "object" == typeof b && b), b.isTrigger = f ? 2 : 3, b.namespace = r.join("."), b.rnamespace = b.namespace ? new RegExp("(^|\\.)" + r.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, b.result = void 0, b.target || (b.target = e), c = null == c ? [b] : n.makeArray(c, [b]), o = n.event.special[q] || {}, f || !o.trigger || o.trigger.apply(e, c) !== !1)) {
                if (!f && !o.noBubble && !n.isWindow(e)) {
                    for (j = o.delegateType || q, ib.test(j + q) || (h = h.parentNode); h; h = h.parentNode) p.push(h), i = h;
                    i === (e.ownerDocument || d) && p.push(i.defaultView || i.parentWindow || a)
                }
                g = 0;
                while ((h = p[g++]) && !b.isPropagationStopped()) b.type = g > 1 ? j : o.bindType || q, m = (N.get(h, "events") || {})[b.type] && N.get(h, "handle"), m && m.apply(h, c), m = l && h[l], m && m.apply && L(h) && (b.result = m.apply(h, c), b.result === !1 && b.preventDefault());
                return b.type = q, f || b.isDefaultPrevented() || o._default && o._default.apply(p.pop(), c) !== !1 || !L(e) || l && n.isFunction(e[q]) && !n.isWindow(e) && (i = e[l], i && (e[l] = null), n.event.triggered = q, e[q](), n.event.triggered = void 0, i && (e[l] = i)), b.result
            }
        },
        simulate: function(a, b, c) {
            var d = n.extend(new n.Event, c, { type: a, isSimulated: !0 });
            n.event.trigger(d, null, b)
        }
    }), n.fn.extend({ trigger: function(a, b) { return this.each(function() { n.event.trigger(a, b, this) }) }, triggerHandler: function(a, b) { var c = this[0]; return c ? n.event.trigger(a, b, c, !0) : void 0 } }), n.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(a, b) { n.fn[b] = function(a, c) { return arguments.length > 0 ? this.on(b, null, a, c) : this.trigger(b) } }), n.fn.extend({ hover: function(a, b) { return this.mouseenter(a).mouseleave(b || a) } }), l.focusin = "onfocusin" in a, l.focusin || n.each({ focus: "focusin", blur: "focusout" }, function(a, b) {
        var c = function(a) { n.event.simulate(b, a.target, n.event.fix(a)) };
        n.event.special[b] = {
            setup: function() {
                var d = this.ownerDocument || this,
                    e = N.access(d, b);
                e || d.addEventListener(a, c, !0), N.access(d, b, (e || 0) + 1)
            },
            teardown: function() {
                var d = this.ownerDocument || this,
                    e = N.access(d, b) - 1;
                e ? N.access(d, b, e) : (d.removeEventListener(a, c, !0), N.remove(d, b))
            }
        }
    });
    var jb = a.location,
        kb = n.now(),
        lb = /\?/;
    n.parseJSON = function(a) { return JSON.parse(a + "") }, n.parseXML = function(b) { var c; if (!b || "string" != typeof b) return null; try { c = (new a.DOMParser).parseFromString(b, "text/xml") } catch (d) { c = void 0 } return c && !c.getElementsByTagName("parsererror").length || n.error("Invalid XML: " + b), c };
    var mb = /#.*$/,
        nb = /([?&])_=[^&]*/,
        ob = /^(.*?):[ \t]*([^\r\n]*)$/gm,
        pb = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
        qb = /^(?:GET|HEAD)$/,
        rb = /^\/\//,
        sb = {},
        tb = {},
        ub = "*/".concat("*"),
        vb = d.createElement("a");
    vb.href = jb.href;

    function wb(a) {
        return function(b, c) {
            "string" != typeof b && (c = b, b = "*");
            var d, e = 0,
                f = b.toLowerCase().match(G) || [];
            if (n.isFunction(c))
                while (d = f[e++]) "+" === d[0] ? (d = d.slice(1) || "*", (a[d] = a[d] || []).unshift(c)) : (a[d] = a[d] || []).push(c)
        }
    }

    function xb(a, b, c, d) {
        var e = {},
            f = a === tb;

        function g(h) { var i; return e[h] = !0, n.each(a[h] || [], function(a, h) { var j = h(b, c, d); return "string" != typeof j || f || e[j] ? f ? !(i = j) : void 0 : (b.dataTypes.unshift(j), g(j), !1) }), i }
        return g(b.dataTypes[0]) || !e["*"] && g("*")
    }

    function yb(a, b) { var c, d, e = n.ajaxSettings.flatOptions || {}; for (c in b) void 0 !== b[c] && ((e[c] ? a : d || (d = {}))[c] = b[c]); return d && n.extend(!0, a, d), a }

    function zb(a, b, c) {
        var d, e, f, g, h = a.contents,
            i = a.dataTypes;
        while ("*" === i[0]) i.shift(), void 0 === d && (d = a.mimeType || b.getResponseHeader("Content-Type"));
        if (d)
            for (e in h)
                if (h[e] && h[e].test(d)) { i.unshift(e); break }
        if (i[0] in c) f = i[0];
        else {
            for (e in c) {
                if (!i[0] || a.converters[e + " " + i[0]]) { f = e; break }
                g || (g = e)
            }
            f = f || g
        }
        return f ? (f !== i[0] && i.unshift(f), c[f]) : void 0
    }

    function Ab(a, b, c, d) {
        var e, f, g, h, i, j = {},
            k = a.dataTypes.slice();
        if (k[1])
            for (g in a.converters) j[g.toLowerCase()] = a.converters[g];
        f = k.shift();
        while (f)
            if (a.responseFields[f] && (c[a.responseFields[f]] = b), !i && d && a.dataFilter && (b = a.dataFilter(b, a.dataType)), i = f, f = k.shift())
                if ("*" === f) f = i;
                else if ("*" !== i && i !== f) {
            if (g = j[i + " " + f] || j["* " + f], !g)
                for (e in j)
                    if (h = e.split(" "), h[1] === f && (g = j[i + " " + h[0]] || j["* " + h[0]])) { g === !0 ? g = j[e] : j[e] !== !0 && (f = h[0], k.unshift(h[1])); break }
            if (g !== !0)
                if (g && a["throws"]) b = g(b);
                else try { b = g(b) } catch (l) { return { state: "parsererror", error: g ? l : "No conversion from " + i + " to " + f } }
        }
        return { state: "success", data: b }
    }
    n.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: { url: jb.href, type: "GET", isLocal: pb.test(jb.protocol), global: !0, processData: !0, async: !0, contentType: "application/x-www-form-urlencoded; charset=UTF-8", accepts: { "*": ub, text: "text/plain", html: "text/html", xml: "application/xml, text/xml", json: "application/json, text/javascript" }, contents: { xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/ }, responseFields: { xml: "responseXML", text: "responseText", json: "responseJSON" }, converters: { "* text": String, "text html": !0, "text json": n.parseJSON, "text xml": n.parseXML }, flatOptions: { url: !0, context: !0 } },
        ajaxSetup: function(a, b) { return b ? yb(yb(a, n.ajaxSettings), b) : yb(n.ajaxSettings, a) },
        ajaxPrefilter: wb(sb),
        ajaxTransport: wb(tb),
        ajax: function(b, c) {
            "object" == typeof b && (c = b, b = void 0), c = c || {};
            var e, f, g, h, i, j, k, l, m = n.ajaxSetup({}, c),
                o = m.context || m,
                p = m.context && (o.nodeType || o.jquery) ? n(o) : n.event,
                q = n.Deferred(),
                r = n.Callbacks("once memory"),
                s = m.statusCode || {},
                t = {},
                u = {},
                v = 0,
                w = "canceled",
                x = {
                    readyState: 0,
                    getResponseHeader: function(a) {
                        var b;
                        if (2 === v) {
                            if (!h) { h = {}; while (b = ob.exec(g)) h[b[1].toLowerCase()] = b[2] }
                            b = h[a.toLowerCase()]
                        }
                        return null == b ? null : b
                    },
                    getAllResponseHeaders: function() { return 2 === v ? g : null },
                    setRequestHeader: function(a, b) { var c = a.toLowerCase(); return v || (a = u[c] = u[c] || a, t[a] = b), this },
                    overrideMimeType: function(a) { return v || (m.mimeType = a), this },
                    statusCode: function(a) {
                        var b;
                        if (a)
                            if (2 > v)
                                for (b in a) s[b] = [s[b], a[b]];
                            else x.always(a[x.status]);
                        return this
                    },
                    abort: function(a) { var b = a || w; return e && e.abort(b), z(0, b), this }
                };
            if (q.promise(x).complete = r.add, x.success = x.done, x.error = x.fail, m.url = ((b || m.url || jb.href) + "").replace(mb, "").replace(rb, jb.protocol + "//"), m.type = c.method || c.type || m.method || m.type, m.dataTypes = n.trim(m.dataType || "*").toLowerCase().match(G) || [""], null == m.crossDomain) { j = d.createElement("a"); try { j.href = m.url, j.href = j.href, m.crossDomain = vb.protocol + "//" + vb.host != j.protocol + "//" + j.host } catch (y) { m.crossDomain = !0 } }
            if (m.data && m.processData && "string" != typeof m.data && (m.data = n.param(m.data, m.traditional)), xb(sb, m, c, x), 2 === v) return x;
            k = n.event && m.global, k && 0 === n.active++ && n.event.trigger("ajaxStart"), m.type = m.type.toUpperCase(), m.hasContent = !qb.test(m.type), f = m.url, m.hasContent || (m.data && (f = m.url += (lb.test(f) ? "&" : "?") + m.data, delete m.data), m.cache === !1 && (m.url = nb.test(f) ? f.replace(nb, "$1_=" + kb++) : f + (lb.test(f) ? "&" : "?") + "_=" + kb++)), m.ifModified && (n.lastModified[f] && x.setRequestHeader("If-Modified-Since", n.lastModified[f]), n.etag[f] && x.setRequestHeader("If-None-Match", n.etag[f])), (m.data && m.hasContent && m.contentType !== !1 || c.contentType) && x.setRequestHeader("Content-Type", m.contentType), x.setRequestHeader("Accept", m.dataTypes[0] && m.accepts[m.dataTypes[0]] ? m.accepts[m.dataTypes[0]] + ("*" !== m.dataTypes[0] ? ", " + ub + "; q=0.01" : "") : m.accepts["*"]);
            for (l in m.headers) x.setRequestHeader(l, m.headers[l]);
            if (m.beforeSend && (m.beforeSend.call(o, x, m) === !1 || 2 === v)) return x.abort();
            w = "abort";
            for (l in { success: 1, error: 1, complete: 1 }) x[l](m[l]);
            if (e = xb(tb, m, c, x)) {
                if (x.readyState = 1, k && p.trigger("ajaxSend", [x, m]), 2 === v) return x;
                m.async && m.timeout > 0 && (i = a.setTimeout(function() { x.abort("timeout") }, m.timeout));
                try { v = 1, e.send(t, z) } catch (y) {
                    if (!(2 > v)) throw y;
                    z(-1, y)
                }
            } else z(-1, "No Transport");

            function z(b, c, d, h) {
                var j, l, t, u, w, y = c;
                2 !== v && (v = 2, i && a.clearTimeout(i), e = void 0, g = h || "", x.readyState = b > 0 ? 4 : 0, j = b >= 200 && 300 > b || 304 === b, d && (u = zb(m, x, d)), u = Ab(m, u, x, j), j ? (m.ifModified && (w = x.getResponseHeader("Last-Modified"), w && (n.lastModified[f] = w), w = x.getResponseHeader("etag"), w && (n.etag[f] = w)), 204 === b || "HEAD" === m.type ? y = "nocontent" : 304 === b ? y = "notmodified" : (y = u.state, l = u.data, t = u.error, j = !t)) : (t = y, !b && y || (y = "error", 0 > b && (b = 0))), x.status = b, x.statusText = (c || y) + "", j ? q.resolveWith(o, [l, y, x]) : q.rejectWith(o, [x, y, t]), x.statusCode(s), s = void 0, k && p.trigger(j ? "ajaxSuccess" : "ajaxError", [x, m, j ? l : t]), r.fireWith(o, [x, y]), k && (p.trigger("ajaxComplete", [x, m]), --n.active || n.event.trigger("ajaxStop")))
            }
            return x
        },
        getJSON: function(a, b, c) { return n.get(a, b, c, "json") },
        getScript: function(a, b) { return n.get(a, void 0, b, "script") }
    }), n.each(["get", "post"], function(a, b) { n[b] = function(a, c, d, e) { return n.isFunction(c) && (e = e || d, d = c, c = void 0), n.ajax(n.extend({ url: a, type: b, dataType: e, data: c, success: d }, n.isPlainObject(a) && a)) } }), n._evalUrl = function(a) { return n.ajax({ url: a, type: "GET", dataType: "script", async: !1, global: !1, "throws": !0 }) }, n.fn.extend({
        wrapAll: function(a) { var b; return n.isFunction(a) ? this.each(function(b) { n(this).wrapAll(a.call(this, b)) }) : (this[0] && (b = n(a, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && b.insertBefore(this[0]), b.map(function() { var a = this; while (a.firstElementChild) a = a.firstElementChild; return a }).append(this)), this) },
        wrapInner: function(a) {
            return n.isFunction(a) ? this.each(function(b) { n(this).wrapInner(a.call(this, b)) }) : this.each(function() {
                var b = n(this),
                    c = b.contents();
                c.length ? c.wrapAll(a) : b.append(a)
            })
        },
        wrap: function(a) { var b = n.isFunction(a); return this.each(function(c) { n(this).wrapAll(b ? a.call(this, c) : a) }) },
        unwrap: function() { return this.parent().each(function() { n.nodeName(this, "body") || n(this).replaceWith(this.childNodes) }).end() }
    }), n.expr.filters.hidden = function(a) { return !n.expr.filters.visible(a) }, n.expr.filters.visible = function(a) { return a.offsetWidth > 0 || a.offsetHeight > 0 || a.getClientRects().length > 0 };
    var Bb = /%20/g,
        Cb = /\[\]$/,
        Db = /\r?\n/g,
        Eb = /^(?:submit|button|image|reset|file)$/i,
        Fb = /^(?:input|select|textarea|keygen)/i;

    function Gb(a, b, c, d) {
        var e;
        if (n.isArray(b)) n.each(b, function(b, e) { c || Cb.test(a) ? d(a, e) : Gb(a + "[" + ("object" == typeof e && null != e ? b : "") + "]", e, c, d) });
        else if (c || "object" !== n.type(b)) d(a, b);
        else
            for (e in b) Gb(a + "[" + e + "]", b[e], c, d)
    }
    n.param = function(a, b) {
        var c, d = [],
            e = function(a, b) { b = n.isFunction(b) ? b() : null == b ? "" : b, d[d.length] = encodeURIComponent(a) + "=" + encodeURIComponent(b) };
        if (void 0 === b && (b = n.ajaxSettings && n.ajaxSettings.traditional), n.isArray(a) || a.jquery && !n.isPlainObject(a)) n.each(a, function() { e(this.name, this.value) });
        else
            for (c in a) Gb(c, a[c], b, e);
        return d.join("&").replace(Bb, "+")
    }, n.fn.extend({ serialize: function() { return n.param(this.serializeArray()) }, serializeArray: function() { return this.map(function() { var a = n.prop(this, "elements"); return a ? n.makeArray(a) : this }).filter(function() { var a = this.type; return this.name && !n(this).is(":disabled") && Fb.test(this.nodeName) && !Eb.test(a) && (this.checked || !X.test(a)) }).map(function(a, b) { var c = n(this).val(); return null == c ? null : n.isArray(c) ? n.map(c, function(a) { return { name: b.name, value: a.replace(Db, "\r\n") } }) : { name: b.name, value: c.replace(Db, "\r\n") } }).get() } }), n.ajaxSettings.xhr = function() { try { return new a.XMLHttpRequest } catch (b) {} };
    var Hb = { 0: 200, 1223: 204 },
        Ib = n.ajaxSettings.xhr();
    l.cors = !!Ib && "withCredentials" in Ib, l.ajax = Ib = !!Ib, n.ajaxTransport(function(b) {
        var c, d;
        return l.cors || Ib && !b.crossDomain ? {
            send: function(e, f) {
                var g, h = b.xhr();
                if (h.open(b.type, b.url, b.async, b.username, b.password), b.xhrFields)
                    for (g in b.xhrFields) h[g] = b.xhrFields[g];
                b.mimeType && h.overrideMimeType && h.overrideMimeType(b.mimeType), b.crossDomain || e["X-Requested-With"] || (e["X-Requested-With"] = "XMLHttpRequest");
                for (g in e) h.setRequestHeader(g, e[g]);
                c = function(a) { return function() { c && (c = d = h.onload = h.onerror = h.onabort = h.onreadystatechange = null, "abort" === a ? h.abort() : "error" === a ? "number" != typeof h.status ? f(0, "error") : f(h.status, h.statusText) : f(Hb[h.status] || h.status, h.statusText, "text" !== (h.responseType || "text") || "string" != typeof h.responseText ? { binary: h.response } : { text: h.responseText }, h.getAllResponseHeaders())) } }, h.onload = c(), d = h.onerror = c("error"), void 0 !== h.onabort ? h.onabort = d : h.onreadystatechange = function() { 4 === h.readyState && a.setTimeout(function() { c && d() }) }, c = c("abort");
                try { h.send(b.hasContent && b.data || null) } catch (i) { if (c) throw i }
            },
            abort: function() { c && c() }
        } : void 0
    }), n.ajaxSetup({ accepts: { script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript" }, contents: { script: /\b(?:java|ecma)script\b/ }, converters: { "text script": function(a) { return n.globalEval(a), a } } }), n.ajaxPrefilter("script", function(a) { void 0 === a.cache && (a.cache = !1), a.crossDomain && (a.type = "GET") }), n.ajaxTransport("script", function(a) { if (a.crossDomain) { var b, c; return { send: function(e, f) { b = n("<script>").prop({ charset: a.scriptCharset, src: a.url }).on("load error", c = function(a) { b.remove(), c = null, a && f("error" === a.type ? 404 : 200, a.type) }), d.head.appendChild(b[0]) }, abort: function() { c && c() } } } });
    var Jb = [],
        Kb = /(=)\?(?=&|$)|\?\?/;
    n.ajaxSetup({ jsonp: "callback", jsonpCallback: function() { var a = Jb.pop() || n.expando + "_" + kb++; return this[a] = !0, a } }), n.ajaxPrefilter("json jsonp", function(b, c, d) { var e, f, g, h = b.jsonp !== !1 && (Kb.test(b.url) ? "url" : "string" == typeof b.data && 0 === (b.contentType || "").indexOf("application/x-www-form-urlencoded") && Kb.test(b.data) && "data"); return h || "jsonp" === b.dataTypes[0] ? (e = b.jsonpCallback = n.isFunction(b.jsonpCallback) ? b.jsonpCallback() : b.jsonpCallback, h ? b[h] = b[h].replace(Kb, "$1" + e) : b.jsonp !== !1 && (b.url += (lb.test(b.url) ? "&" : "?") + b.jsonp + "=" + e), b.converters["script json"] = function() { return g || n.error(e + " was not called"), g[0] }, b.dataTypes[0] = "json", f = a[e], a[e] = function() { g = arguments }, d.always(function() { void 0 === f ? n(a).removeProp(e) : a[e] = f, b[e] && (b.jsonpCallback = c.jsonpCallback, Jb.push(e)), g && n.isFunction(f) && f(g[0]), g = f = void 0 }), "script") : void 0 }), n.parseHTML = function(a, b, c) {
        if (!a || "string" != typeof a) return null;
        "boolean" == typeof b && (c = b, b = !1), b = b || d;
        var e = x.exec(a),
            f = !c && [];
        return e ? [b.createElement(e[1])] : (e = ca([a], b, f), f && f.length && n(f).remove(), n.merge([], e.childNodes))
    };
    var Lb = n.fn.load;
    n.fn.load = function(a, b, c) {
        if ("string" != typeof a && Lb) return Lb.apply(this, arguments);
        var d, e, f, g = this,
            h = a.indexOf(" ");
        return h > -1 && (d = n.trim(a.slice(h)), a = a.slice(0, h)), n.isFunction(b) ? (c = b, b = void 0) : b && "object" == typeof b && (e = "POST"), g.length > 0 && n.ajax({ url: a, type: e || "GET", dataType: "html", data: b }).done(function(a) { f = arguments, g.html(d ? n("<div>").append(n.parseHTML(a)).find(d) : a) }).always(c && function(a, b) { g.each(function() { c.apply(this, f || [a.responseText, b, a]) }) }), this
    }, n.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(a, b) { n.fn[b] = function(a) { return this.on(b, a) } }), n.expr.filters.animated = function(a) { return n.grep(n.timers, function(b) { return a === b.elem }).length };

    function Mb(a) { return n.isWindow(a) ? a : 9 === a.nodeType && a.defaultView }
    n.offset = {
        setOffset: function(a, b, c) {
            var d, e, f, g, h, i, j, k = n.css(a, "position"),
                l = n(a),
                m = {};
            "static" === k && (a.style.position = "relative"), h = l.offset(), f = n.css(a, "top"), i = n.css(a, "left"), j = ("absolute" === k || "fixed" === k) && (f + i).indexOf("auto") > -1, j ? (d = l.position(), g = d.top, e = d.left) : (g = parseFloat(f) || 0, e = parseFloat(i) || 0), n.isFunction(b) && (b = b.call(a, c, n.extend({}, h))), null != b.top && (m.top = b.top - h.top + g), null != b.left && (m.left = b.left - h.left + e), "using" in b ? b.using.call(a, m) : l.css(m)
        }
    }, n.fn.extend({
        offset: function(a) {
            if (arguments.length) return void 0 === a ? this : this.each(function(b) { n.offset.setOffset(this, a, b) });
            var b, c, d = this[0],
                e = { top: 0, left: 0 },
                f = d && d.ownerDocument;
            if (f) return b = f.documentElement, n.contains(b, d) ? (e = d.getBoundingClientRect(), c = Mb(f), { top: e.top + c.pageYOffset - b.clientTop, left: e.left + c.pageXOffset - b.clientLeft }) : e
        },
        position: function() {
            if (this[0]) {
                var a, b, c = this[0],
                    d = { top: 0, left: 0 };
                return "fixed" === n.css(c, "position") ? b = c.getBoundingClientRect() : (a = this.offsetParent(), b = this.offset(), n.nodeName(a[0], "html") || (d = a.offset()), d.top += n.css(a[0], "borderTopWidth", !0), d.left += n.css(a[0], "borderLeftWidth", !0)), { top: b.top - d.top - n.css(c, "marginTop", !0), left: b.left - d.left - n.css(c, "marginLeft", !0) }
            }
        },
        offsetParent: function() { return this.map(function() { var a = this.offsetParent; while (a && "static" === n.css(a, "position")) a = a.offsetParent; return a || Ea }) }
    }), n.each({ scrollLeft: "pageXOffset", scrollTop: "pageYOffset" }, function(a, b) {
        var c = "pageYOffset" === b;
        n.fn[a] = function(d) { return K(this, function(a, d, e) { var f = Mb(a); return void 0 === e ? f ? f[b] : a[d] : void(f ? f.scrollTo(c ? f.pageXOffset : e, c ? e : f.pageYOffset) : a[d] = e) }, a, d, arguments.length) }
    }), n.each(["top", "left"], function(a, b) { n.cssHooks[b] = Ga(l.pixelPosition, function(a, c) { return c ? (c = Fa(a, b), Ba.test(c) ? n(a).position()[b] + "px" : c) : void 0 }) }), n.each({ Height: "height", Width: "width" }, function(a, b) {
        n.each({ padding: "inner" + a, content: b, "": "outer" + a }, function(c, d) {
            n.fn[d] = function(d, e) {
                var f = arguments.length && (c || "boolean" != typeof d),
                    g = c || (d === !0 || e === !0 ? "margin" : "border");
                return K(this, function(b, c, d) { var e; return n.isWindow(b) ? b.document.documentElement["client" + a] : 9 === b.nodeType ? (e = b.documentElement, Math.max(b.body["scroll" + a], e["scroll" + a], b.body["offset" + a], e["offset" + a], e["client" + a])) : void 0 === d ? n.css(b, c, g) : n.style(b, c, d, g) }, b, f ? d : void 0, f, null)
            }
        })
    }), n.fn.extend({ bind: function(a, b, c) { return this.on(a, null, b, c) }, unbind: function(a, b) { return this.off(a, null, b) }, delegate: function(a, b, c, d) { return this.on(b, a, c, d) }, undelegate: function(a, b, c) { return 1 === arguments.length ? this.off(a, "**") : this.off(b, a || "**", c) }, size: function() { return this.length } }), n.fn.andSelf = n.fn.addBack, "function" == typeof define && define.amd && define("jquery", [], function() { return n });
    var Nb = a.jQuery,
        Ob = a.$;
    return n.noConflict = function(b) { return a.$ === n && (a.$ = Ob), b && a.jQuery === n && (a.jQuery = Nb), n }, b || (a.jQuery = a.$ = n), n
});

;
/*!
 * jQuery Migrate - v1.4.1 - 2016-05-19
 * Copyright jQuery Foundation and other contributors
 */
(function(jQuery, window, undefined) {
    jQuery.migrateVersion = "1.4.1";
    var warnedAbout = {};
    jQuery.migrateWarnings = [];
    if (window.console && window.console.log) {
        window.console.log("JQMIGRATE: Migrate is installed" +
            (jQuery.migrateMute ? "" : " with logging active") + ", version " + jQuery.migrateVersion);
    }
    if (jQuery.migrateTrace === undefined) { jQuery.migrateTrace = true; }
    jQuery.migrateReset = function() {
        warnedAbout = {};
        jQuery.migrateWarnings.length = 0;
    };

    function migrateWarn(msg) {
        var console = window.console;
        if (!warnedAbout[msg]) {
            warnedAbout[msg] = true;
            jQuery.migrateWarnings.push(msg);
            if (console && console.warn && !jQuery.migrateMute) { console.warn("JQMIGRATE: " + msg); if (jQuery.migrateTrace && console.trace) { console.trace(); } }
        }
    }

    function migrateWarnProp(obj, prop, value, msg) {
        if (Object.defineProperty) {
            try {
                Object.defineProperty(obj, prop, {
                    configurable: true,
                    enumerable: true,
                    get: function() { migrateWarn(msg); return value; },
                    set: function(newValue) {
                        migrateWarn(msg);
                        value = newValue;
                    }
                });
                return;
            } catch (err) {}
        }
        jQuery._definePropertyBroken = true;
        obj[prop] = value;
    }
    if (document.compatMode === "BackCompat") { migrateWarn("jQuery is not compatible with Quirks Mode"); }
    var attrFn = jQuery("<input/>", { size: 1 }).attr("size") && jQuery.attrFn,
        oldAttr = jQuery.attr,
        valueAttrGet = jQuery.attrHooks.value && jQuery.attrHooks.value.get || function() { return null; },
        valueAttrSet = jQuery.attrHooks.value && jQuery.attrHooks.value.set || function() { return undefined; },
        rnoType = /^(?:input|button)$/i,
        rnoAttrNodeType = /^[238]$/,
        rboolean = /^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,
        ruseDefault = /^(?:checked|selected)$/i;
    migrateWarnProp(jQuery, "attrFn", attrFn || {}, "jQuery.attrFn is deprecated");
    jQuery.attr = function(elem, name, value, pass) {
        var lowerName = name.toLowerCase(),
            nType = elem && elem.nodeType;
        if (pass) {
            if (oldAttr.length < 4) { migrateWarn("jQuery.fn.attr( props, pass ) is deprecated"); }
            if (elem && !rnoAttrNodeType.test(nType) && (attrFn ? name in attrFn : jQuery.isFunction(jQuery.fn[name]))) { return jQuery(elem)[name](value); }
        }
        if (name === "type" && value !== undefined && rnoType.test(elem.nodeName) && elem.parentNode) { migrateWarn("Can't change the 'type' of an input or button in IE 6/7/8"); }
        if (!jQuery.attrHooks[lowerName] && rboolean.test(lowerName)) {
            jQuery.attrHooks[lowerName] = {
                get: function(elem, name) { var attrNode, property = jQuery.prop(elem, name); return property === true || typeof property !== "boolean" && (attrNode = elem.getAttributeNode(name)) && attrNode.nodeValue !== false ? name.toLowerCase() : undefined; },
                set: function(elem, value, name) {
                    var propName;
                    if (value === false) { jQuery.removeAttr(elem, name); } else {
                        propName = jQuery.propFix[name] || name;
                        if (propName in elem) { elem[propName] = true; }
                        elem.setAttribute(name, name.toLowerCase());
                    }
                    return name;
                }
            };
            if (ruseDefault.test(lowerName)) { migrateWarn("jQuery.fn.attr('" + lowerName + "') might use property instead of attribute"); }
        }
        return oldAttr.call(jQuery, elem, name, value);
    };
    jQuery.attrHooks.value = {
        get: function(elem, name) {
            var nodeName = (elem.nodeName || "").toLowerCase();
            if (nodeName === "button") { return valueAttrGet.apply(this, arguments); }
            if (nodeName !== "input" && nodeName !== "option") { migrateWarn("jQuery.fn.attr('value') no longer gets properties"); }
            return name in elem ? elem.value : null;
        },
        set: function(elem, value) {
            var nodeName = (elem.nodeName || "").toLowerCase();
            if (nodeName === "button") { return valueAttrSet.apply(this, arguments); }
            if (nodeName !== "input" && nodeName !== "option") { migrateWarn("jQuery.fn.attr('value', val) no longer sets properties"); }
            elem.value = value;
        }
    };
    var matched, browser, oldInit = jQuery.fn.init,
        oldFind = jQuery.find,
        oldParseJSON = jQuery.parseJSON,
        rspaceAngle = /^\s*</,
        rattrHashTest = /\[(\s*[-\w]+\s*)([~|^$*]?=)\s*([-\w#]*?#[-\w#]*)\s*\]/,
        rattrHashGlob = /\[(\s*[-\w]+\s*)([~|^$*]?=)\s*([-\w#]*?#[-\w#]*)\s*\]/g,
        rquickExpr = /^([^<]*)(<[\w\W]+>)([^>]*)$/;
    jQuery.fn.init = function(selector, context, rootjQuery) {
        var match, ret;
        if (selector && typeof selector === "string") {
            if (!jQuery.isPlainObject(context) && (match = rquickExpr.exec(jQuery.trim(selector))) && match[0]) {
                if (!rspaceAngle.test(selector)) { migrateWarn("$(html) HTML strings must start with '<' character"); }
                if (match[3]) { migrateWarn("$(html) HTML text after last tag is ignored"); }
                if (match[0].charAt(0) === "#") {
                    migrateWarn("HTML string cannot start with a '#' character");
                    jQuery.error("JQMIGRATE: Invalid selector string (XSS)");
                }
                if (context && context.context && context.context.nodeType) { context = context.context; }
                if (jQuery.parseHTML) { return oldInit.call(this, jQuery.parseHTML(match[2], context && context.ownerDocument || context || document, true), context, rootjQuery); }
            }
        }
        ret = oldInit.apply(this, arguments);
        if (selector && selector.selector !== undefined) {
            ret.selector = selector.selector;
            ret.context = selector.context;
        } else { ret.selector = typeof selector === "string" ? selector : ""; if (selector) { ret.context = selector.nodeType ? selector : context || document; } }
        return ret;
    };
    jQuery.fn.init.prototype = jQuery.fn;
    jQuery.find = function(selector) {
        var args = Array.prototype.slice.call(arguments);
        if (typeof selector === "string" && rattrHashTest.test(selector)) {
            try { document.querySelector(selector); } catch (err1) {
                selector = selector.replace(rattrHashGlob, function(_, attr, op, value) { return "[" + attr + op + "\"" + value + "\"]"; });
                try {
                    document.querySelector(selector);
                    migrateWarn("Attribute selector with '#' must be quoted: " + args[0]);
                    args[0] = selector;
                } catch (err2) { migrateWarn("Attribute selector with '#' was not fixed: " + args[0]); }
            }
        }
        return oldFind.apply(this, args);
    };
    var findProp;
    for (findProp in oldFind) { if (Object.prototype.hasOwnProperty.call(oldFind, findProp)) { jQuery.find[findProp] = oldFind[findProp]; } }
    jQuery.parseJSON = function(json) {
        if (!json) { migrateWarn("jQuery.parseJSON requires a valid JSON string"); return null; }
        return oldParseJSON.apply(this, arguments);
    };
    jQuery.uaMatch = function(ua) { ua = ua.toLowerCase(); var match = /(chrome)[ \/]([\w.]+)/.exec(ua) || /(webkit)[ \/]([\w.]+)/.exec(ua) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(ua) || /(msie) ([\w.]+)/.exec(ua) || ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(ua) || []; return { browser: match[1] || "", version: match[2] || "0" }; };
    if (!jQuery.browser) {
        matched = jQuery.uaMatch(navigator.userAgent);
        browser = {};
        if (matched.browser) {
            browser[matched.browser] = true;
            browser.version = matched.version;
        }
        if (browser.chrome) { browser.webkit = true; } else if (browser.webkit) { browser.safari = true; }
        jQuery.browser = browser;
    }
    migrateWarnProp(jQuery, "browser", jQuery.browser, "jQuery.browser is deprecated");
    jQuery.boxModel = jQuery.support.boxModel = (document.compatMode === "CSS1Compat");
    migrateWarnProp(jQuery, "boxModel", jQuery.boxModel, "jQuery.boxModel is deprecated");
    migrateWarnProp(jQuery.support, "boxModel", jQuery.support.boxModel, "jQuery.support.boxModel is deprecated");
    jQuery.sub = function() {
        function jQuerySub(selector, context) { return new jQuerySub.fn.init(selector, context); }
        jQuery.extend(true, jQuerySub, this);
        jQuerySub.superclass = this;
        jQuerySub.fn = jQuerySub.prototype = this();
        jQuerySub.fn.constructor = jQuerySub;
        jQuerySub.sub = this.sub;
        jQuerySub.fn.init = function init(selector, context) { var instance = jQuery.fn.init.call(this, selector, context, rootjQuerySub); return instance instanceof jQuerySub ? instance : jQuerySub(instance); };
        jQuerySub.fn.init.prototype = jQuerySub.fn;
        var rootjQuerySub = jQuerySub(document);
        migrateWarn("jQuery.sub() is deprecated");
        return jQuerySub;
    };
    jQuery.fn.size = function() { migrateWarn("jQuery.fn.size() is deprecated; use the .length property"); return this.length; };
    var internalSwapCall = false;
    if (jQuery.swap) {
        jQuery.each(["height", "width", "reliableMarginRight"], function(_, name) {
            var oldHook = jQuery.cssHooks[name] && jQuery.cssHooks[name].get;
            if (oldHook) {
                jQuery.cssHooks[name].get = function() {
                    var ret;
                    internalSwapCall = true;
                    ret = oldHook.apply(this, arguments);
                    internalSwapCall = false;
                    return ret;
                };
            }
        });
    }
    jQuery.swap = function(elem, options, callback, args) {
        var ret, name, old = {};
        if (!internalSwapCall) { migrateWarn("jQuery.swap() is undocumented and deprecated"); }
        for (name in options) {
            old[name] = elem.style[name];
            elem.style[name] = options[name];
        }
        ret = callback.apply(elem, args || []);
        for (name in options) { elem.style[name] = old[name]; }
        return ret;
    };
    jQuery.ajaxSetup({ converters: { "text json": jQuery.parseJSON } });
    var oldFnData = jQuery.fn.data;
    jQuery.fn.data = function(name) {
        var ret, evt, elem = this[0];
        if (elem && name === "events" && arguments.length === 1) {
            ret = jQuery.data(elem, name);
            evt = jQuery._data(elem, name);
            if ((ret === undefined || ret === evt) && evt !== undefined) { migrateWarn("Use of jQuery.fn.data('events') is deprecated"); return evt; }
        }
        return oldFnData.apply(this, arguments);
    };
    var rscriptType = /\/(java|ecma)script/i;
    if (!jQuery.clean) {
        jQuery.clean = function(elems, context, fragment, scripts) {
            context = context || document;
            context = !context.nodeType && context[0] || context;
            context = context.ownerDocument || context;
            migrateWarn("jQuery.clean() is deprecated");
            var i, elem, handleScript, jsTags, ret = [];
            jQuery.merge(ret, jQuery.buildFragment(elems, context).childNodes);
            if (fragment) {
                handleScript = function(elem) { if (!elem.type || rscriptType.test(elem.type)) { return scripts ? scripts.push(elem.parentNode ? elem.parentNode.removeChild(elem) : elem) : fragment.appendChild(elem); } };
                for (i = 0;
                    (elem = ret[i]) != null; i++) {
                    if (!(jQuery.nodeName(elem, "script") && handleScript(elem))) {
                        fragment.appendChild(elem);
                        if (typeof elem.getElementsByTagName !== "undefined") {
                            jsTags = jQuery.grep(jQuery.merge([], elem.getElementsByTagName("script")), handleScript);
                            ret.splice.apply(ret, [i + 1, 0].concat(jsTags));
                            i += jsTags.length;
                        }
                    }
                }
            }
            return ret;
        };
    }
    var eventAdd = jQuery.event.add,
        eventRemove = jQuery.event.remove,
        eventTrigger = jQuery.event.trigger,
        oldToggle = jQuery.fn.toggle,
        oldLive = jQuery.fn.live,
        oldDie = jQuery.fn.die,
        oldLoad = jQuery.fn.load,
        ajaxEvents = "ajaxStart|ajaxStop|ajaxSend|ajaxComplete|ajaxError|ajaxSuccess",
        rajaxEvent = new RegExp("\\b(?:" + ajaxEvents + ")\\b"),
        rhoverHack = /(?:^|\s)hover(\.\S+|)\b/,
        hoverHack = function(events) {
            if (typeof(events) !== "string" || jQuery.event.special.hover) { return events; }
            if (rhoverHack.test(events)) { migrateWarn("'hover' pseudo-event is deprecated, use 'mouseenter mouseleave'"); }
            return events && events.replace(rhoverHack, "mouseenter$1 mouseleave$1");
        };
    if (jQuery.event.props && jQuery.event.props[0] !== "attrChange") { jQuery.event.props.unshift("attrChange", "attrName", "relatedNode", "srcElement"); }
    if (jQuery.event.dispatch) { migrateWarnProp(jQuery.event, "handle", jQuery.event.dispatch, "jQuery.event.handle is undocumented and deprecated"); }
    jQuery.event.add = function(elem, types, handler, data, selector) {
        if (elem !== document && rajaxEvent.test(types)) { migrateWarn("AJAX events should be attached to document: " + types); }
        eventAdd.call(this, elem, hoverHack(types || ""), handler, data, selector);
    };
    jQuery.event.remove = function(elem, types, handler, selector, mappedTypes) { eventRemove.call(this, elem, hoverHack(types) || "", handler, selector, mappedTypes); };
    jQuery.each(["load", "unload", "error"], function(_, name) {
        jQuery.fn[name] = function() {
            var args = Array.prototype.slice.call(arguments, 0);
            if (name === "load" && typeof args[0] === "string") { return oldLoad.apply(this, args); }
            migrateWarn("jQuery.fn." + name + "() is deprecated");
            args.splice(0, 0, name);
            if (arguments.length) { return this.bind.apply(this, args); }
            this.triggerHandler.apply(this, args);
            return this;
        };
    });
    jQuery.fn.toggle = function(fn, fn2) {
        if (!jQuery.isFunction(fn) || !jQuery.isFunction(fn2)) { return oldToggle.apply(this, arguments); }
        migrateWarn("jQuery.fn.toggle(handler, handler...) is deprecated");
        var args = arguments,
            guid = fn.guid || jQuery.guid++,
            i = 0,
            toggler = function(event) {
                var lastToggle = (jQuery._data(this, "lastToggle" + fn.guid) || 0) % i;
                jQuery._data(this, "lastToggle" + fn.guid, lastToggle + 1);
                event.preventDefault();
                return args[lastToggle].apply(this, arguments) || false;
            };
        toggler.guid = guid;
        while (i < args.length) { args[i++].guid = guid; }
        return this.click(toggler);
    };
    jQuery.fn.live = function(types, data, fn) {
        migrateWarn("jQuery.fn.live() is deprecated");
        if (oldLive) { return oldLive.apply(this, arguments); }
        jQuery(this.context).on(types, this.selector, data, fn);
        return this;
    };
    jQuery.fn.die = function(types, fn) {
        migrateWarn("jQuery.fn.die() is deprecated");
        if (oldDie) { return oldDie.apply(this, arguments); }
        jQuery(this.context).off(types, this.selector || "**", fn);
        return this;
    };
    jQuery.event.trigger = function(event, data, elem, onlyHandlers) {
        if (!elem && !rajaxEvent.test(event)) { migrateWarn("Global events are undocumented and deprecated"); }
        return eventTrigger.call(this, event, data, elem || document, onlyHandlers);
    };
    jQuery.each(ajaxEvents.split("|"), function(_, name) {
        jQuery.event.special[name] = {
            setup: function() {
                var elem = this;
                if (elem !== document) {
                    jQuery.event.add(document, name + "." + jQuery.guid, function() { jQuery.event.trigger(name, Array.prototype.slice.call(arguments, 1), elem, true); });
                    jQuery._data(this, name, jQuery.guid++);
                }
                return false;
            },
            teardown: function() {
                if (this !== document) { jQuery.event.remove(document, name + "." + jQuery._data(this, name)); }
                return false;
            }
        };
    });
    jQuery.event.special.ready = { setup: function() { if (this === document) { migrateWarn("'ready' event is deprecated"); } } };
    var oldSelf = jQuery.fn.andSelf || jQuery.fn.addBack,
        oldFnFind = jQuery.fn.find;
    jQuery.fn.andSelf = function() { migrateWarn("jQuery.fn.andSelf() replaced by jQuery.fn.addBack()"); return oldSelf.apply(this, arguments); };
    jQuery.fn.find = function(selector) {
        var ret = oldFnFind.apply(this, arguments);
        ret.context = this.context;
        ret.selector = this.selector ? this.selector + " " + selector : selector;
        return ret;
    };
    if (jQuery.Callbacks) {
        var oldDeferred = jQuery.Deferred,
            tuples = [
                ["resolve", "done", jQuery.Callbacks("once memory"), jQuery.Callbacks("once memory"), "resolved"],
                ["reject", "fail", jQuery.Callbacks("once memory"), jQuery.Callbacks("once memory"), "rejected"],
                ["notify", "progress", jQuery.Callbacks("memory"), jQuery.Callbacks("memory")]
            ];
        jQuery.Deferred = function(func) {
            var deferred = oldDeferred(),
                promise = deferred.promise();
            deferred.pipe = promise.pipe = function() {
                var fns = arguments;
                migrateWarn("deferred.pipe() is deprecated");
                return jQuery.Deferred(function(newDefer) {
                    jQuery.each(tuples, function(i, tuple) {
                        var fn = jQuery.isFunction(fns[i]) && fns[i];
                        deferred[tuple[1]](function() { var returned = fn && fn.apply(this, arguments); if (returned && jQuery.isFunction(returned.promise)) { returned.promise().done(newDefer.resolve).fail(newDefer.reject).progress(newDefer.notify); } else { newDefer[tuple[0] + "With"](this === promise ? newDefer.promise() : this, fn ? [returned] : arguments); } });
                    });
                    fns = null;
                }).promise();
            };
            deferred.isResolved = function() { migrateWarn("deferred.isResolved is deprecated"); return deferred.state() === "resolved"; };
            deferred.isRejected = function() { migrateWarn("deferred.isRejected is deprecated"); return deferred.state() === "rejected"; };
            if (func) { func.call(deferred, deferred); }
            return deferred;
        };
    }
})(jQuery, window);;
(function($) {
    $(function() {
        load_event();
        transparent_load_event();
        backtop();
        diapoFunc();
        faqFunc();
        checkFunc();
        popupFunc();
        GnaviFunc();
        $("#topics dt:even").addClass("bg_b");
    });
})(jQuery);
var load_event = function() {
    $('a>img[src*="-out-"],input[src*="-out-"]').each(function() {
        var $$ = $(this);
        $$.mouseover(function() { $(this).attr('src', $(this).attr('src').replace(/-out-/, '-on-')) });
        $$.mouseout(function() { if ($(this).attr('wws') != 'current') { $(this).attr('src', $(this).attr('src').replace(/-on-/, '-out-')) } });
    });
}
var subwin_func = function() {
    var $$ = $(this);
    var param = $$.attr('subwin').split(/\D+/);
    var w = param[0] || 300;
    var h = param[1] || 300;
    var s = ($$.attr('subwin').match(/slim/)) ? 'no' : 'yes';
    var r = ($$.attr('subwin').match(/fix/)) ? 'no' : 'yes';
    var t = $$.attr('target') || '_blank';
    window.open($$.attr('href'), t, "resizable=" + r + ",scrollbars=" + s + ",width=" + w + ",height=" + h).focus();
    return false;
}
var transparent_load_event = function() {
    var timer = setTimeout(function() {
        $('a img.transparent').each(function() {
            var $$ = $(this);
            $$.bind("mouseover", function() { $(this).stop().queue([]).fadeTo(300, 0.7); })
            $$.bind("mouseout", function() { $(this).stop().queue([]).fadeTo(300, 1); })
        });
    }, 600)
}
var backtop = function() {
    $(window).scroll(function() { if ($(this).scrollTop() != 0) { $('#pagetop-btn').fadeIn(); } else { $('#pagetop-btn').fadeOut(); } });
    $('#pagetop-btn a').click(function() { $('body,html').animate({ scrollTop: 0 }, "slow"); return false; });
}
var diapoFunc = function() { $('.pix_diapo').diapo(); }
var faqFunc = function() {
    $('.tab-list>li:nth-child(1)').addClass('selected')
    var $items = $('.tab-list>li');
    $items.click(function() {
        $items.removeClass('selected');
        $(this).addClass('selected');
        var index = $items.index($(this));
        $('.tab-content').hide().eq(index).show();
    }).eq(0).click();
    $(".faq-list dt").bind("click", function() {
        var disVal = $(this).next().css("display");
        if (disVal !== "none") {
            $("span", $(this)).removeClass("current")
            $(this).next().slideToggle('slow');
        } else {
            $("span", $(this)).addClass("current")
            $(this).next().slideToggle('slow');
        }
    })
}
var checkFunc = function() {
    $(".checkbox-list li,.radio-list li,#header .remember-check").each(function(i) {
        var $parent = $(this);
        if ($(":checkbox", this).is(":checked")) { $parent.find("span").addClass("checked"); }
        if ($(":radio", this).is(":checked")) { $parent.find("span").addClass("checked"); }
    });
    $(".checkbox-list li,#header .remember-check").bind("click", function() {
        if ($(":checkbox", this).is(":checked")) { $("span", this).addClass("checked") } else { $("span", this).removeClass("checked"); }
    });
    $(".input-check").focus(function() {
        var prev_label = $(this).prev();
        $("input:checkbox", prev_label).prop("checked", true);
    });
    $(".radio-list > li ").bind("click", function() {
        if ($(":radio", this).is(":checked")) {
            $(this).find("span").addClass("checked");
            $(".radio-list > li input:not(:checked)").prev().removeClass("checked");
        } else { $(this).removeClass("checked"); }
    });
};
var popupFunc = function() {
    $(".popup-show").fancybox({ 'width': 540, 'height': 690, 'autoScale': false, 'transitionIn': 'none', 'transitionOut': 'none', 'type': 'iframe', 'scrolling': 'no' });
    $(".popup-show-register").fancybox({ 'width': 540, 'height': 1100, 'autoScale': false, 'transitionIn': 'none', 'transitionOut': 'none', 'type': 'iframe', 'scrolling': 'no' });
}
var GnaviFunc = function() {
    var $navi = $("#g-navi ul li:eq(3)");
    $navi.each(function() {
        $(this).hover(function() {
            $(".sub-navi", this).stop(true, true).slideDown();
            $(">a", this).addClass("active")
        }, function() {
            $(".sub-navi", $(this)).stop(true, true).slideUp();
            $(">a", this).removeClass("active")
        });
    });
    $("#search-btn").bind("click", function() {
        $(".g-navi-box").css("display", "none");
        $(".g-navi__search").css("display", "block");
        $(".g-navi__search__input").focus();
    });
    $("#close-btn").bind("click", function() {
        $(".g-navi-box").css("display", "block");
        $(".g-navi__search").css("display", "none");
    });
    $(".g-navi__search__input").bind("blur", function() {
        $(".g-navi-box").css("display", "block");
        $(".g-navi__search").css("display", "none");
    });
    $(".g-navi__search__input").bind("keyup", function(e) {
        if (e.keyCode === 27) {
            $(".g-navi-box").css("display", "block");
            $(".g-navi__search").css("display", "none");
        }
    });
};;
$.fn.slideScroll = function(options) {
    var c = $.extend({ interval: 20, easing: 0.6, comeLink: false }, options);
    var d = document;
    var timer;
    var pos;

    function currentPoint() {
        var current = { x: d.body.scrollLeft || d.documentElement.scrollLeft, y: d.body.scrollTop || d.documentElement.scrollTop }
        return current;
    }

    function setPoint() {
        var h = d.documentElement.clientHeight;
        var w = d.documentElement.clientWidth;
        var maxH = d.documentElement.scrollHeight;
        var maxW = d.documentElement.scrollWidth;
        pos.top = ((maxH - h) < pos.top && pos.top < maxH) ? maxH - h : pos.top;
        pos.left = ((maxW - w) < pos.left && pos.left < maxW) ? maxW - w : pos.left;
    }

    function nextPoint() {
        var x = currentPoint().x;
        var y = currentPoint().y;
        var sx = Math.ceil((x - pos.left) / (5 * c.easing));
        var sy = Math.ceil((y - pos.top) / (5 * c.easing));
        var next = { x: x - sx, y: y - sy, ax: sx, ay: sy }
        return next;
    }

    function scroll(href) {
        var movedHash = href;
        timer = setInterval(function() {
            nextPoint();
            if (Math.abs(nextPoint().ax) < 1 && Math.abs(nextPoint().ay) < 1) {
                clearInterval(timer);
                window.scroll(pos.left, pos.top);
                location.href = movedHash;
            }
            window.scroll(nextPoint().x, nextPoint().y);
        }, c.interval);
    }

    function comeLink() {
        if (location.hash) {
            if ($(location.hash) && $(location.hash).length > 0) {
                pos = $(location.hash).offset();
                setPoint();
                window.scroll(0, 0);
                if ($.browser.msie) { setTimeout(function() { scroll(location.hash); }, 50); } else { scroll(location.hash); }
            }
        }
    }
    if (c.comeLink) comeLink();
    $(this).each(function() {
        var href_1 = this.href.replace('?', '');
        var href_2 = location.href.split("#")[0].replace('?', '');
        if (this.hash && $(this.hash).length > 0 && href_1.match(href_2)) {
            var hash = this.hash;
            $(this).click(function() {
                pos = $(hash).offset();
                clearInterval(timer);
                setPoint();
                scroll(this.href);
                return false;
            });
        }
    });
};
new function() {
    function heightLine() {
        this.className = "heightLine";
        this.parentClassName = "heightLineParent"
        reg = new RegExp(this.className + "-([a-zA-Z0-9-_]+)", "i");
        objCN = new Array();
        var objAll = document.getElementsByTagName ? document.getElementsByTagName("*") : document.all;
        for (var i = 0; i < objAll.length; i++) {
            var eltClass = ('' + objAll[i].className).split(/\s+/);
            for (var j = 0; j < eltClass.length; j++) {
                if (eltClass[j] == this.className) {
                    if (!objCN["main CN"]) objCN["main CN"] = new Array();
                    objCN["main CN"].push(objAll[i]);
                    break;
                } else if (eltClass[j] == this.parentClassName) {
                    if (!objCN["parent CN"]) objCN["parent CN"] = new Array();
                    objCN["parent CN"].push(objAll[i]);
                    break;
                } else if (eltClass[j].match(reg)) {
                    var OCN = eltClass[j].match(reg)
                    if (!objCN[OCN]) objCN[OCN] = new Array();
                    objCN[OCN].push(objAll[i]);
                    break;
                }
            }
        }
        var e = document.createElement("div");
        var s = document.createTextNode("S");
        e.appendChild(s);
        e.style.visibility = "hidden"
        e.style.position = "absolute"
        e.style.top = "0"
        document.body.appendChild(e);
        var defHeight = e.offsetHeight;
        changeBoxSize = function() {
            for (var key in objCN) {
                if (objCN.hasOwnProperty(key)) {
                    if (key == "parent CN") {
                        for (var i = 0; i < objCN[key].length; i++) {
                            var max_height = 0;
                            var CCN = objCN[key][i].childNodes;
                            for (var j = 0; j < CCN.length; j++) {
                                if (CCN[j] && CCN[j].nodeType == 1) {
                                    CCN[j].style.height = "auto";
                                    max_height = max_height > CCN[j].offsetHeight ? max_height : CCN[j].offsetHeight;
                                }
                            }
                            for (var j = 0; j < CCN.length; j++) {
                                if (CCN[j].style) {
                                    var stylea = CCN[j].currentStyle || document.defaultView.getComputedStyle(CCN[j], '');
                                    var newheight = max_height;
                                    if (stylea.paddingTop) newheight -= stylea.paddingTop.replace("px", "");
                                    if (stylea.paddingBottom) newheight -= stylea.paddingBottom.replace("px", "");
                                    if (stylea.borderTopWidth && stylea.borderTopWidth != "medium") newheight -= stylea.borderTopWidth.replace("px", "");
                                    if (stylea.borderBottomWidth && stylea.borderBottomWidth != "medium") newheight -= stylea.borderBottomWidth.replace("px", "");
                                    CCN[j].style.height = newheight + "px";
                                }
                            }
                        }
                    } else {
                        var max_height = 0;
                        for (var i = 0; i < objCN[key].length; i++) {
                            objCN[key][i].style.height = "auto";
                            max_height = max_height > objCN[key][i].offsetHeight ? max_height : objCN[key][i].offsetHeight;
                        }
                        for (var i = 0; i < objCN[key].length; i++) {
                            if (objCN[key][i].style) {
                                var stylea = objCN[key][i].currentStyle || document.defaultView.getComputedStyle(objCN[key][i], '');
                                var newheight = max_height;
                                if (stylea.paddingTop) newheight -= stylea.paddingTop.replace("px", "");
                                if (stylea.paddingBottom) newheight -= stylea.paddingBottom.replace("px", "");
                                if (stylea.borderTopWidth && stylea.borderTopWidth != "medium") newheight -= stylea.borderTopWidth.replace("px", "")
                                if (stylea.borderBottomWidth && stylea.borderBottomWidth != "medium") newheight -= stylea.borderBottomWidth.replace("px", "");
                                objCN[key][i].style.height = newheight + "px";
                            }
                        }
                    }
                }
            }
        }
        checkBoxSize = function() {
            if (defHeight != e.offsetHeight) {
                changeBoxSize();
                defHeight = e.offsetHeight;
            }
        }
        changeBoxSize();
        setInterval(checkBoxSize, 1000)
        window.onresize = changeBoxSize;
    }

    function addEvent(elm, listener, fn) { try { elm.addEventListener(listener, fn, false); } catch (e) { elm.attachEvent("on" + listener, fn); } }
    addEvent(window, "load", heightLine);
};
jQuery.easing['jswing'] = jQuery.easing['swing'];
jQuery.extend(jQuery.easing, {
    def: 'easeOutQuad',
    swing: function(x, t, b, c, d) { return jQuery.easing[jQuery.easing.def](x, t, b, c, d); },
    easeInQuad: function(x, t, b, c, d) { return c * (t /= d) * t + b; },
    easeOutQuad: function(x, t, b, c, d) { return -c * (t /= d) * (t - 2) + b; },
    easeInOutQuad: function(x, t, b, c, d) { if ((t /= d / 2) < 1) return c / 2 * t * t + b; return -c / 2 * ((--t) * (t - 2) - 1) + b; },
    easeInCubic: function(x, t, b, c, d) { return c * (t /= d) * t * t + b; },
    easeOutCubic: function(x, t, b, c, d) { return c * ((t = t / d - 1) * t * t + 1) + b; },
    easeInOutCubic: function(x, t, b, c, d) { if ((t /= d / 2) < 1) return c / 2 * t * t * t + b; return c / 2 * ((t -= 2) * t * t + 2) + b; },
    easeInQuart: function(x, t, b, c, d) { return c * (t /= d) * t * t * t + b; },
    easeOutQuart: function(x, t, b, c, d) { return -c * ((t = t / d - 1) * t * t * t - 1) + b; },
    easeInOutQuart: function(x, t, b, c, d) { if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b; return -c / 2 * ((t -= 2) * t * t * t - 2) + b; },
    easeInQuint: function(x, t, b, c, d) { return c * (t /= d) * t * t * t * t + b; },
    easeOutQuint: function(x, t, b, c, d) { return c * ((t = t / d - 1) * t * t * t * t + 1) + b; },
    easeInOutQuint: function(x, t, b, c, d) { if ((t /= d / 2) < 1) return c / 2 * t * t * t * t * t + b; return c / 2 * ((t -= 2) * t * t * t * t + 2) + b; },
    easeInSine: function(x, t, b, c, d) { return -c * Math.cos(t / d * (Math.PI / 2)) + c + b; },
    easeOutSine: function(x, t, b, c, d) { return c * Math.sin(t / d * (Math.PI / 2)) + b; },
    easeInOutSine: function(x, t, b, c, d) { return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b; },
    easeInExpo: function(x, t, b, c, d) { return (t == 0) ? b : c * Math.pow(2, 10 * (t / d - 1)) + b; },
    easeOutExpo: function(x, t, b, c, d) { return (t == d) ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b; },
    easeInOutExpo: function(x, t, b, c, d) { if (t == 0) return b; if (t == d) return b + c; if ((t /= d / 2) < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b; return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b; },
    easeInCirc: function(x, t, b, c, d) { return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b; },
    easeOutCirc: function(x, t, b, c, d) { return c * Math.sqrt(1 - (t = t / d - 1) * t) + b; },
    easeInOutCirc: function(x, t, b, c, d) { if ((t /= d / 2) < 1) return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b; return c / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + b; },
    easeInElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d) == 1) return b + c;
        if (!p) p = d * .3;
        if (a < Math.abs(c)) { a = c; var s = p / 4; } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
    },
    easeOutElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d) == 1) return b + c;
        if (!p) p = d * .3;
        if (a < Math.abs(c)) { a = c; var s = p / 4; } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
    },
    easeInOutElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d / 2) == 2) return b + c;
        if (!p) p = d * (.3 * 1.5);
        if (a < Math.abs(c)) { a = c; var s = p / 4; } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        if (t < 1) return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
        return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b;
    },
    easeInBack: function(x, t, b, c, d, s) { if (s == undefined) s = 1.70158; return c * (t /= d) * t * ((s + 1) * t - s) + b; },
    easeOutBack: function(x, t, b, c, d, s) { if (s == undefined) s = 1.70158; return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b; },
    easeInOutBack: function(x, t, b, c, d, s) { if (s == undefined) s = 1.70158; if ((t /= d / 2) < 1) return c / 2 * (t * t * (((s *= (1.525)) + 1) * t - s)) + b; return c / 2 * ((t -= 2) * t * (((s *= (1.525)) + 1) * t + s) + 2) + b; },
    easeInBounce: function(x, t, b, c, d) { return c - jQuery.easing.easeOutBounce(x, d - t, 0, c, d) + b; },
    easeOutBounce: function(x, t, b, c, d) { if ((t /= d) < (1 / 2.75)) { return c * (7.5625 * t * t) + b; } else if (t < (2 / 2.75)) { return c * (7.5625 * (t -= (1.5 / 2.75)) * t + .75) + b; } else if (t < (2.5 / 2.75)) { return c * (7.5625 * (t -= (2.25 / 2.75)) * t + .9375) + b; } else { return c * (7.5625 * (t -= (2.625 / 2.75)) * t + .984375) + b; } },
    easeInOutBounce: function(x, t, b, c, d) { if (t < d / 2) return jQuery.easing.easeInBounce(x, t * 2, 0, c, d) * .5 + b; return jQuery.easing.easeOutBounce(x, t * 2 - d, 0, c, d) * .5 + c * .5 + b; }
});;
(function($) {
    $.fn.hoverIntent = function(f, g) {
        var cfg = { sensitivity: 7, interval: 100, timeout: 0 };
        cfg = $.extend(cfg, g ? { over: f, out: g } : f);
        var cX, cY, pX, pY;
        var track = function(ev) {
            cX = ev.pageX;
            cY = ev.pageY
        };
        var compare = function(ev, ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            if ((Math.abs(pX - cX) + Math.abs(pY - cY)) < cfg.sensitivity) {
                $(ob).unbind("mousemove", track);
                ob.hoverIntent_s = 1;
                return cfg.over.apply(ob, [ev])
            } else {
                pX = cX;
                pY = cY;
                ob.hoverIntent_t = setTimeout(function() { compare(ev, ob) }, cfg.interval)
            }
        };
        var delay = function(ev, ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            ob.hoverIntent_s = 0;
            return cfg.out.apply(ob, [ev])
        };
        var handleHover = function(e) {
            var ev = jQuery.extend({}, e);
            var ob = this;
            if (ob.hoverIntent_t) { ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t) }
            if (e.type == "mouseenter") {
                pX = ev.pageX;
                pY = ev.pageY;
                $(ob).bind("mousemove", track);
                if (ob.hoverIntent_s != 1) { ob.hoverIntent_t = setTimeout(function() { compare(ev, ob) }, cfg.interval) }
            } else { $(ob).unbind("mousemove", track); if (ob.hoverIntent_s == 1) { ob.hoverIntent_t = setTimeout(function() { delay(ev, ob) }, cfg.timeout) } }
        };
        return this.bind('mouseenter', handleHover).bind('mouseleave', handleHover)
    }
})(jQuery);;;
(function($) {
    $.fn.diapo = function(opts, callback) {
        var defaults = { selector: 'div', fx: 'random', mobileFx: '', slideOn: 'random', gridDifference: 250, easing: 'easeInOutExpo', mobileEasing: '', loader: 'pie', loaderOpacity: .8, loaderColor: '#ffff00', loaderBgColor: '#222222', pieDiameter: 50, piePosition: 'top:5px; right:5px', pieStroke: 8, barPosition: 'bottom', barStroke: 5, navigation: true, mobileNavigation: true, navigationHover: true, mobileNavHover: true, commands: true, mobileCommands: true, pagination: true, mobilePagination: true, thumbs: true, hover: true, pauseOnClick: true, rows: 4, cols: 6, slicedRows: 8, slicedCols: 12, time: 3000, transPeriod: 1500, autoAdvance: true, mobileAutoAdvance: true, onStartLoading: function() {}, onLoaded: function() {}, onEnterSlide: function() {}, onStartTransition: function() {} };

        function isMobile() { if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i)) { return true; } }
        var opts = $.extend({}, defaults, opts);
        var elem = this;
        var h = elem.height();
        var w = elem.width();
        var u;
        var clickEv, autoAdv, navigation, navHover, commands, pagination;
        if (isMobile()) { clickEv = 'tap'; } else { clickEv = 'click'; }
        if (isMobile()) { autoAdv = opts.mobileAutoAdvance; } else { autoAdv = opts.autoAdvance; }
        if (autoAdv == false) { elem.addClass('stopped'); }
        if (isMobile()) { navigation = opts.mobileNavigation; } else { navigation = opts.navigation; }
        if (isMobile()) { navHover = opts.mobileNavHover; } else { navHover = opts.navigationHover; }
        if (isMobile()) { commands = opts.mobileCommands; } else { commands = opts.commands; }
        if (isMobile()) { pagination = opts.mobilePagination; } else { pagination = opts.pagination; }

        function loadimages(imgArr, callback) {
            if (!$.browser.msie || ($.browser.msie && $.browser.version == 9)) {
                var imagesLoaded = 0;
                opts.onStartLoading.call(this);
                $.each(imgArr, function(i, image) {
                    var img = new Image();
                    img.onload = function() {
                        imagesLoaded++;
                        if (imagesLoaded == imgArr.length) {
                            opts.onLoaded.call(this);
                            callback();
                        }
                    };
                    img.src = image;
                });
            } else { callback(); }
        }
        if (elem.length != 0) {
            var selector = $('> ' + opts.selector, elem).not('#pix_canvas').not('#pix_canvas_wrap').not('#pix_next').not('#pix_prev').not('#pix_commands');
            selector.wrapInner('<div class="pix_relativize" style="width:' + w + 'px; height:' + h + 'px" />');
            var amountSlide = selector.length;
            var nav;

            function imgFake() {
                $('*[data-fake]', elem).each(function() {
                    var t = $(this);
                    var imgFakeUrl = t.attr('data-fake');
                    var imgFake = new Image();
                    imgFake.src = imgFakeUrl;
                    t.after($(imgFake).attr('class', 'imgFake'));
                    var clone = t.clone();
                    t.remove();
                    $('.elemToHide').show();
                    $(imgFake)[clickEv](function() {
                        $(this).hide().after(clone);
                        $('.elemToHide').hide();
                    });
                });
            }
            imgFake();
            if (opts.hover == true) { if (!isMobile()) { elem.hoverIntent({ over: function() { elem.addClass('stopped'); }, out: function() { if (autoAdv != false) { elem.removeClass('stopped'); } }, timeout: 0 }); } }
            if (navHover == true) {
                if (isMobile()) {
                    elem.live('vmouseover', function() { $('#pix_prev, #pix_next').animate({ opacity: 1 }, 200); });
                    elem.live('vmouseout', function() { $('#pix_prev, #pix_next').delay(500).animate({ opacity: 0 }, 200); });
                } else { elem.hover(function() { $('#pix_prev, #pix_next').stop(true, false).animate({ opacity: 1 }, 200); }, function() { $('#pix_prev, #pix_next').stop(true, false).animate({ opacity: 0 }, 200); }); }
            }
            $.fn.diapoStop = function() {
                autoAdv = false;
                elem.addClass('stopped');
                if ($('#pix_stop').length) { $('#pix_stop').fadeOut(100, function() { $('#pix_play').fadeIn(100); if (opts.loader != 'none') { $('#pix_canvas').fadeOut(100); } }); } else { if (opts.loader != 'none') { $('#pix_canvas').fadeOut(100); } }
            }
            $('#pix_stop').live('click', function() { elem.diapoStop(); });
            $.fn.diapoPlay = function() {
                autoAdv = true;
                elem.removeClass('stopped');
                if ($('#pix_play').length) { $('#pix_play').fadeOut(100, function() { $('#pix_stop').fadeIn(100); if (opts.loader != 'none') { $('#pix_canvas').fadeIn(100); } }); } else { if (opts.loader != 'none') { $('#pix_canvas').fadeIn(100); } }
            }
            $('#pix_play').live('click', function() { elem.diapoPlay(); });
            if (opts.pauseOnClick == true) {
                selector[clickEv](function() {
                    autoAdv = false;
                    elem.addClass('stopped');
                    $('#pix_stop').fadeOut(100, function() {
                        $('#pix_play').fadeIn(100);
                        $('#pix_canvas').fadeOut(100);
                    });
                });
            }
            var allImg = new Array();
            $('img', elem).each(function() { allImg.push($(this).attr('src')); });
            if (!$.browser.msie) {
                $('div, span, a', elem).each(function() {
                    var bG = $(this).css('background');
                    var bG2 = $(this).attr('style');
                    if (typeof bG !== 'undefined' && bG !== false && bG.indexOf("url") != -1) {
                        var bGstart = bG.lastIndexOf('url(') + 4;
                        var bGfinish = bG.lastIndexOf(')');
                        bG = bG.substring(bGstart, bGfinish);
                        bG = bG.replace(/'/g, '');
                        bG = bG.replace(/"/g, '');
                        allImg.push(bG);
                    } else if (typeof bG2 !== 'undefined' && bG2 !== false && bG2.indexOf("url") != -1) {
                        var bG2start = bG2.lastIndexOf('url(') + 4;
                        var bG2finish = bG2.lastIndexOf(')');
                        bG2 = bG2.substring(bG2start, bG2finish);
                        bG2 = bG2.replace(/'/g, '');
                        bG2 = bG2.replace(/"/g, '');
                        allImg.push(bG2);
                    }
                });
            }
            loadimages(allImg, nextSlide);
        }

        function shuffle(arr) { for (var j, x, i = arr.length; i; j = parseInt(Math.random() * i), x = arr[--i], arr[i] = arr[j], arr[j] = x); return arr; }

        function isInteger(s) { return Math.ceil(s) == Math.floor(s); }
        if (($.browser.msie && $.browser.version < 9) || opts.loader == 'bar') {
            elem.append('<span id="pix_canvas" />');
            var canvas = $("#pix_canvas");
            if (opts.barPosition == 'top') { canvas.css({ 'top': 0 }); } else { canvas.css({ 'bottom': 0 }); }
            canvas.css({ 'position': 'absolute', 'left': 0, 'z-index': 1001, 'height': opts.barStroke, 'width': 0, 'background-color': opts.loaderColor });
        } else {
            elem.append('<canvas id="pix_canvas"></canvas>');
            var G_vmlCanvasManager;
            var canvas = document.getElementById("pix_canvas");
            canvas.setAttribute("width", opts.pieDiameter);
            canvas.setAttribute("height", opts.pieDiameter);
            canvas.setAttribute("style", "position:absolute; z-index:1002; " + opts.piePosition);
            var rad;
            var radNew;
            if (canvas && canvas.getContext) {
                var ctx = canvas.getContext("2d");
                ctx.rotate(Math.PI * (3 / 2));
                ctx.translate(-opts.pieDiameter, 0);
            }
        }
        if (opts.loader == 'none' || autoAdv == false) { $('#pix_canvas, #pix_canvas_wrap').hide(); }
        if (navigation == true) {
            elem.append('<div id="pix_prev" />').append('<div id="pix_next" />');
            $('#pix_prev').animate({ opacity: 0 }, 200);
        }
        elem.after('<div id="pix_pag" />');
        if (pagination == true) {
            $('#pix_pag').append('<ul id="pix_pag_ul" />');
            var li;
            for (li = 0; li < amountSlide; li++) {
                $('#pix_pag_ul').append('<li id="pag_nav_' + li + '" style="position:relative; z-index:1002"><span><span>' + li + '</span></span></li>');
                if (opts.thumbs == true) {
                    var dataThumb = selector.eq(li).attr('data-thumb');
                    var newImg = new Image();
                    newImg.src = dataThumb;
                    $('li#pag_nav_' + li).append($(newImg).attr('class', 'pix_thumb').css('position', 'absolute').animate({ opacity: 0 }, 0));
                    $('li#pag_nav_' + li + ' > img').after('<div class="thumb_arrow" />');
                    $('li#pag_nav_' + li + ' > .thumb_arrow').animate({ opacity: 0 }, 0);
                    if (!isMobile()) { $('#pix_pag li').hover(function() { $('.pix_thumb, .thumb_arrow', this).addClass('visible').stop(true, false).animate({ 'margin-top': -15, opacity: 1 }, 300, 'easeOutQuad'); }, function() { $('.pix_thumb, .thumb_arrow', this).removeClass('visible').stop(true, false).animate({ 'margin-top': 0, opacity: 0 }, 150); }); }
                }
            }
        }
        if (commands == true) {
            $('#pix_pag').append('<div id="pix_commands" />');
            $('#pix_pag').find('#pix_commands').append('<div id="pix_play" />').append('<div id="pix_stop" />');
            if (autoAdv == true) {
                $('#pix_play').hide();
                $('#pix_stop').show();
            } else {
                $('#pix_stop').hide();
                $('#pix_play').show();
            }
        }
        if (navHover == true) { $('#pix_prev, #pix_next').animate({ opacity: 0 }, 0); }

        function canvasLoader() {
            opts.onStartTransition.call(this);
            rad = 0;
            if (($.browser.msie && $.browser.version < 9) || opts.loader == 'bar') { $('#pix_canvas').css({ 'width': 0 }); } else { ctx.clearRect(0, 0, opts.pieDiameter, opts.pieDiameter); }
        }
        canvasLoader();
        $('.fromLeft, .fromRight, .fromTop, .fromBottom, .fadeIn').each(function() { $(this).css('visibility', 'hidden'); });

        function nextSlide(nav) {
            elem.addClass('diaposliding');
            var vis = parseFloat($('> ' + opts.selector + '.diapocurrent', elem).not('#pix_canvas').not('#pix_canvas_wrap').not('#pix_next').not('#pix_prev').not('#pix_commands').index());
            if (nav > 0) { var i = nav - 1; } else if (vis == amountSlide - 1) { var i = 0; } else { var i = vis + 1; }
            var rows = opts.rows,
                cols = opts.cols,
                couples = 1,
                difference = 0,
                dataSlideOn, time, fx, easing, randomFx = new Array('simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft', 'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight', 'scrollLeft', 'scrollRight', 'scrollTop', 'scrollBottom', 'scrollHorz');
            marginLeft = 0, marginTop = 0;
            if (isMobile()) { var dataFx = selector.eq(i).attr('data-fx'); } else { var dataFx = selector.eq(i).attr('data-mobileFx'); }
            if (typeof dataFx !== 'undefined' && dataFx !== false) { fx = dataFx; } else {
                if (isMobile() && opts.mobileFx != '') { fx = opts.mobileFx; } else { fx = opts.fx; }
                if (fx == 'random') {
                    fx = shuffle(randomFx);
                    fx = fx[0];
                } else {
                    fx = fx;
                    if (fx.indexOf(',') > 0) {
                        fx = fx.replace(/ /g, '');
                        fx = fx.split(',');
                        fx = shuffle(fx);
                        fx = fx[0];
                    }
                }
            }
            if (isMobile() && opts.mobileEasing != '') { easing = opts.mobileEasing; } else { easing = opts.easing; }
            dataSlideOn = selector.eq(i).attr('data-slideOn');
            if (typeof dataSlideOn !== 'undefined' && dataSlideOn !== false) { slideOn = dataSlideOn; } else {
                if (opts.slideOn == 'random') {
                    var slideOn = new Array('next', 'prev');
                    slideOn = shuffle(slideOn);
                    slideOn = slideOn[0];
                } else { slideOn = opts.slideOn; }
            }
            time = selector.eq(i).attr('data-time');
            if (typeof time !== 'undefined' && time !== false) { time = time; } else { time = opts.time; }
            if (!$(elem).hasClass('diapostarted')) {
                fx = 'simpleFade';
                slideOn = 'next';
                $(elem).addClass('diapostarted')
            }
            switch (fx) {
                case 'simpleFade':
                    cols = 1;
                    rows = 1;
                    break;
                case 'curtainTopLeft':
                    if (opts.slicedCols == 0) { cols = opts.cols; } else { cols = opts.slicedCols; }
                    rows = 1;
                    break;
                case 'curtainTopRight':
                    if (opts.slicedCols == 0) { cols = opts.cols; } else { cols = opts.slicedCols; }
                    rows = 1;
                    break;
                case 'curtainBottomLeft':
                    if (opts.slicedCols == 0) { cols = opts.cols; } else { cols = opts.slicedCols; }
                    rows = 1;
                    break;
                case 'curtainBottomRight':
                    if (opts.slicedCols == 0) { cols = opts.cols; } else { cols = opts.slicedCols; }
                    rows = 1;
                    break;
                case 'curtainSliceLeft':
                    if (opts.slicedCols == 0) { cols = opts.cols; } else { cols = opts.slicedCols; }
                    rows = 1;
                    break;
                case 'curtainSliceRight':
                    if (opts.slicedCols == 0) { cols = opts.cols; } else { cols = opts.slicedCols; }
                    rows = 1;
                    break;
                case 'blindCurtainTopLeft':
                    if (opts.slicedRows == 0) { rows = opts.rows; } else { rows = opts.slicedRows; }
                    cols = 1;
                    break;
                case 'blindCurtainTopRight':
                    if (opts.slicedRows == 0) { rows = opts.rows; } else { rows = opts.slicedRows; }
                    cols = 1;
                    break;
                case 'blindCurtainBottomLeft':
                    if (opts.slicedRows == 0) { rows = opts.rows; } else { rows = opts.slicedRows; }
                    cols = 1;
                    break;
                case 'blindCurtainBottomRight':
                    if (opts.slicedRows == 0) { rows = opts.rows; } else { rows = opts.slicedRows; }
                    cols = 1;
                    break;
                case 'blindCurtainSliceTop':
                    if (opts.slicedRows == 0) { rows = opts.rows; } else { rows = opts.slicedRows; }
                    cols = 1;
                    break;
                case 'blindCurtainSliceBottom':
                    if (opts.slicedRows == 0) { rows = opts.rows; } else { rows = opts.slicedRows; }
                    cols = 1;
                    break;
                case 'stampede':
                    difference = '-' + opts.transPeriod;
                    break;
                case 'mosaic':
                    difference = opts.gridDifference;
                    break;
                case 'mosaicReverse':
                    difference = opts.gridDifference;
                    break;
                case 'mosaicRandom':
                    break;
                case 'mosaicSpiral':
                    difference = opts.gridDifference;
                    couples = 1.7;
                    break;
                case 'mosaicSpiralReverse':
                    difference = opts.gridDifference;
                    couples = 1.7;
                    break;
                case 'topLeftBottomRight':
                    difference = opts.gridDifference;
                    couples = 6;
                    break;
                case 'bottomRightTopLeft':
                    difference = opts.gridDifference;
                    couples = 6;
                    break;
                case 'bottomLeftTopRight':
                    difference = opts.gridDifference;
                    couples = 6;
                    break;
                case 'topRightBottomLeft':
                    difference = opts.gridDifference;
                    couples = 6;
                    break;
                case 'scrollLeft':
                    cols = 1;
                    rows = 1;
                    break;
                case 'scrollRight':
                    cols = 1;
                    rows = 1;
                    break;
                case 'scrollTop':
                    cols = 1;
                    rows = 1;
                    break;
                case 'scrollBottom':
                    cols = 1;
                    rows = 1;
                    break;
                case 'scrollHorz':
                    cols = 1;
                    rows = 1;
                    break;
            }
            var cycle = 0;
            var blocks = rows * cols;
            var leftScrap = w - (Math.floor(w / cols) * cols);
            var topScrap = h - (Math.floor(h / rows) * rows);
            var addLeft;
            var addTop;
            var tAppW = 0;
            var tAppH = 0;
            var arr = new Array();
            var delay = new Array();
            var order = new Array();
            while (cycle < blocks) {
                arr.push(cycle);
                delay.push(cycle);
                elem.append('<div class="diapoappended" style="display:none; overflow:hidden; position:absolute; z-index:1000" />');
                var tApp = $('.diapoappended:eq(' + cycle + ')');
                tApp.find('iframe').remove();
                if (fx == 'scrollLeft' || fx == 'scrollRight' || fx == 'scrollTop' || fx == 'scrollBottom' || fx == 'scrollHorz') { selector.eq(i).clone().show().appendTo(tApp); } else { if (slideOn == 'next') { selector.eq(i).clone().show().appendTo(tApp); } else { selector.eq(vis).clone().show().appendTo(tApp); } }
                if (cycle % cols < leftScrap) { addLeft = 1; } else { addLeft = 0; }
                if (cycle % cols == 0) { tAppW = 0; }
                if (Math.floor(cycle / cols) < topScrap) { addTop = 1; } else { addTop = 0; }
                tApp.css({ 'height': Math.floor((h / rows) + addTop + 1), 'left': tAppW, 'top': tAppH, 'width': Math.floor((w / cols) + addLeft + 1) });
                $('> ' + opts.selector, tApp).not('#pix_canvas').not('#pix_canvas_wrap').not('#pix_next').not('#pix_prev').not('#pix_commands').css({ 'height': h, 'margin-left': '-' + tAppW + 'px', 'margin-top': '-' + tAppH + 'px', 'width': w });
                tAppW = tAppW + tApp.width() - 1;
                if (cycle % cols == cols - 1) { tAppH = tAppH + tApp.height() - 1; }
                cycle++;
            }
            switch (fx) {
                case 'curtainTopLeft':
                    break;
                case 'curtainBottomLeft':
                    break;
                case 'curtainSliceLeft':
                    break;
                case 'curtainTopRight':
                    arr = arr.reverse();
                    break;
                case 'curtainBottomRight':
                    arr = arr.reverse();
                    break;
                case 'curtainSliceRight':
                    arr = arr.reverse();
                    break;
                case 'blindCurtainTopLeft':
                    break;
                case 'blindCurtainBottomLeft':
                    arr = arr.reverse();
                    break;
                case 'blindCurtainSliceTop':
                    break;
                case 'blindCurtainTopRight':
                    break;
                case 'blindCurtainBottomRight':
                    arr = arr.reverse();
                    break;
                case 'blindCurtainSliceBottom':
                    arr = arr.reverse();
                    break;
                case 'stampede':
                    arr = shuffle(arr);
                    break;
                case 'mosaic':
                    break;
                case 'mosaicReverse':
                    arr = arr.reverse();
                    break;
                case 'mosaicRandom':
                    arr = shuffle(arr);
                    break;
                case 'mosaicSpiral':
                    var rows2 = rows / 2,
                        x, y, z, n = 0;
                    for (z = 0; z < rows2; z++) {
                        y = z;
                        for (x = z; x < cols - z - 1; x++) { order[n++] = y * cols + x; }
                        x = cols - z - 1;
                        for (y = z; y < rows - z - 1; y++) { order[n++] = y * cols + x; }
                        y = rows - z - 1;
                        for (x = cols - z - 1; x > z; x--) { order[n++] = y * cols + x; }
                        x = z;
                        for (y = rows - z - 1; y > z; y--) { order[n++] = y * cols + x; }
                    }
                    arr = order;
                    break;
                case 'mosaicSpiralReverse':
                    var rows2 = rows / 2,
                        x, y, z, n = blocks - 1;
                    for (z = 0; z < rows2; z++) {
                        y = z;
                        for (x = z; x < cols - z - 1; x++) { order[n--] = y * cols + x; }
                        x = cols - z - 1;
                        for (y = z; y < rows - z - 1; y++) { order[n--] = y * cols + x; }
                        y = rows - z - 1;
                        for (x = cols - z - 1; x > z; x--) { order[n--] = y * cols + x; }
                        x = z;
                        for (y = rows - z - 1; y > z; y--) { order[n--] = y * cols + x; }
                    }
                    arr = order;
                    break;
                case 'topLeftBottomRight':
                    for (var y = 0; y < rows; y++)
                        for (var x = 0; x < cols; x++) { order.push(x + y); }
                    delay = order;
                    break;
                case 'bottomRightTopLeft':
                    for (var y = 0; y < rows; y++)
                        for (var x = 0; x < cols; x++) { order.push(x + y); }
                    delay = order.reverse();
                    break;
                case 'bottomLeftTopRight':
                    for (var y = rows; y > 0; y--)
                        for (var x = 0; x < cols; x++) { order.push(x + y); }
                    delay = order;
                    break;
                case 'topRightBottomLeft':
                    for (var y = 0; y < rows; y++)
                        for (var x = cols; x > 0; x--) { order.push(x + y); }
                    delay = order;
                    break;
            }
            $.each(arr, function(index, value) {
                if (value % cols < leftScrap) { addLeft = 1; } else { addLeft = 0; }
                if (value % cols == 0) { tAppW = 0; }
                if (Math.floor(value / cols) < topScrap) { addTop = 1; } else { addTop = 0; }
                $('.interval').text(fx);
                switch (fx) {
                    case 'simpleFade':
                        height = h;
                        width = w;
                        break;
                    case 'curtainTopLeft':
                        height = 0, width = Math.floor((w / cols) + addLeft + 1), marginTop = '-' + Math.floor((h / rows) + addTop + 1) + 'px';
                        break;
                    case 'curtainTopRight':
                        height = 0, width = Math.floor((w / cols) + addLeft + 1), marginTop = '-' + Math.floor((h / rows) + addTop + 1) + 'px';
                        break;
                    case 'curtainBottomLeft':
                        height = 0, width = Math.floor((w / cols) + addLeft + 1), marginTop = Math.floor((h / rows) + addTop + 1) + 'px';
                        break;
                    case 'curtainBottomRight':
                        height = 0, width = Math.floor((w / cols) + addLeft + 1), marginTop = Math.floor((h / rows) + addTop + 1) + 'px';
                        break;
                    case 'curtainSliceLeft':
                        height = 0, width = Math.floor((w / cols) + addLeft + 1);
                        if (value % 2 == 0) { marginTop = Math.floor((h / rows) + addTop + 1) + 'px'; } else { marginTop = '-' + Math.floor((h / rows) + addTop + 1) + 'px'; }
                        break;
                    case 'curtainSliceRight':
                        height = 0, width = Math.floor((w / cols) + addLeft + 1);
                        if (value % 2 == 0) { marginTop = Math.floor((h / rows) + addTop + 1) + 'px'; } else { marginTop = '-' + Math.floor((h / rows) + addTop + 1) + 'px'; }
                        break;
                    case 'blindCurtainTopLeft':
                        height = Math.floor((h / rows) + addTop + 1), width = 0, marginLeft = '-' + Math.floor((w / cols) + addLeft + 1) + 'px';
                        break;
                    case 'blindCurtainTopRight':
                        height = Math.floor((h / rows) + addTop + 1), width = 0, marginLeft = Math.floor((w / cols) + addLeft + 1) + 'px';
                        break;
                    case 'blindCurtainBottomLeft':
                        height = Math.floor((h / rows) + addTop + 1), width = 0, marginLeft = '-' + Math.floor((w / cols) + addLeft + 1) + 'px';
                        break;
                    case 'blindCurtainBottomRight':
                        height = Math.floor((h / rows) + addTop + 1), width = 0, marginLeft = Math.floor((w / cols) + addLeft + 1) + 'px';
                        break;
                    case 'blindCurtainSliceBottom':
                        height = Math.floor((h / rows) + addTop + 1), width = 0;
                        if (value % 2 == 0) { marginLeft = '-' + Math.floor((w / cols) + addLeft + 1) + 'px'; } else { marginLeft = Math.floor((w / cols) + addLeft + 1) + 'px'; }
                        break;
                    case 'blindCurtainSliceTop':
                        height = Math.floor((h / rows) + addTop + 1), width = 0;
                        if (value % 2 == 0) { marginLeft = '-' + Math.floor((w / cols) + addLeft + 1) + 'px'; } else { marginLeft = Math.floor((w / cols) + addLeft + 1) + 'px'; }
                        break;
                    case 'stampede':
                        height = 0;
                        width = 0;
                        marginLeft = (w * 0.2) * (((index) % cols) - (cols - (Math.floor(cols / 2)))) + 'px';
                        marginTop = (h * 0.2) * ((Math.floor(index / cols) + 1) - (rows - (Math.floor(rows / 2)))) + 'px';
                        break;
                    case 'mosaic':
                        height = 0;
                        width = 0;
                        break;
                    case 'mosaicReverse':
                        height = 0;
                        width = 0;
                        marginLeft = Math.floor((w / cols) + addLeft + 1) + 'px';
                        marginTop = Math.floor((h / rows) + addTop + 1) + 'px';
                        break;
                    case 'mosaicRandom':
                        height = 0;
                        width = 0;
                        marginLeft = Math.floor((w / cols) + addLeft + 1) * 0.5 + 'px';
                        marginTop = Math.floor((h / rows) + addTop + 1) * 0.5 + 'px';
                        break;
                    case 'mosaicSpiral':
                        height = 0;
                        width = 0;
                        marginLeft = Math.floor((w / cols) + addLeft + 1) * 0.5 + 'px';
                        marginTop = Math.floor((h / rows) + addTop + 1) * 0.5 + 'px';
                        break;
                    case 'mosaicSpiralReverse':
                        height = 0;
                        width = 0;
                        marginLeft = Math.floor((w / cols) + addLeft + 1) * 0.5 + 'px';
                        marginTop = Math.floor((h / rows) + addTop + 1) * 0.5 + 'px';
                        break;
                    case 'topLeftBottomRight':
                        height = 0;
                        width = 0;
                        break;
                    case 'bottomRightTopLeft':
                        height = 0;
                        width = 0;
                        marginLeft = Math.floor((w / cols) + addLeft + 1) + 'px';
                        marginTop = Math.floor((h / rows) + addTop + 1) + 'px';
                        break;
                    case 'bottomLeftTopRight':
                        height = 0;
                        width = 0;
                        marginLeft = 0;
                        marginTop = Math.floor((h / rows) + addTop + 1) + 'px';
                        break;
                    case 'topRightBottomLeft':
                        height = 0;
                        width = 0;
                        marginLeft = Math.floor((w / cols) + addLeft + 1) + 'px';
                        marginTop = '-' + Math.floor((h / rows) + addTop + 1) + 'px';
                        break;
                    case 'scrollRight':
                        height = h;
                        width = w;
                        marginLeft = -w;
                        break;
                    case 'scrollLeft':
                        height = h;
                        width = w;
                        marginLeft = w;
                        break;
                    case 'scrollTop':
                        height = h;
                        width = w;
                        marginTop = h;
                        break;
                    case 'scrollBottom':
                        height = h;
                        width = w;
                        marginTop = -h;
                        break;
                    case 'scrollHorz':
                        height = h;
                        width = w;
                        if (vis == 0 && i == amountSlide - 1) { marginLeft = -w; } else if (vis < i || (vis == amountSlide - 1 && i == 0)) { marginLeft = w; } else { marginLeft = -w; }
                        break;
                }
                var tApp = $('.diapoappended:eq(' + value + ')');
                if (typeof u !== 'undefined') {
                    clearInterval(u);
                    setTimeout(canvasLoader, opts.transPeriod + difference);
                }

                function diapoeased() {
                    $(this).addClass('diapoeased');
                    if ($('.diapoeased').length == blocks) {
                        opts.onEnterSlide.call(this);
                        $('.fromLeft, .fromRight, .fromTop, .fromBottom, .fadeIn').each(function() { $(this).css('visibility', 'hidden'); });
                        selector.eq(i).show().css('z-index', '999').addClass('diapocurrent');
                        selector.eq(vis).css('z-index', '1').removeClass('diapocurrent');
                        var lMoveIn = selector.eq(i).find('.fromLeft, .fromRight, .fromTop, .fromBottom, .fadeIn').length;
                        if (lMoveIn != 0) {
                            $('.diapocurrent .fromLeft, .diapocurrent .fromRight, .diapocurrent .fromTop, .diapocurrent .fromBottom, .diapocurrent .fadeIn').each(function() {
                                if ($(this).attr('data-easing') != '') { var easeMove = $(this).attr('data-easing'); } else { var easeMove = easing; }
                                var t = $(this);
                                var wMoveIn = t.width();
                                var hMoveIn = t.outerHeight();
                                t.css('width', wMoveIn);
                                var pos = t.position();
                                var left = pos.left;
                                var top = pos.top;
                                var tClass = t.attr('class');
                                var ind = t.index();
                                var hRel = t.parents('.pix_relativize').height();
                                var wRel = t.parents('.pix_relativize').width();
                                if (tClass.indexOf("fromLeft") != -1) {
                                    t.css({ 'left': '-' + wRel + 'px', 'right': 'auto' });
                                    t.css('visibility', 'visible').delay((time / lMoveIn) * (0.1 * (ind - 1))).animate({ 'left': pos.left }, (time / lMoveIn) * 0.2, easeMove);
                                } else if (tClass.indexOf("fromRight") != -1) {
                                    t.css({ 'left': wRel + 'px', 'right': 'auto' });
                                    t.css('visibility', 'visible').delay((time / lMoveIn) * (0.1 * (ind - 1))).animate({ 'left': pos.left }, (time / lMoveIn) * 0.2, easeMove);
                                } else if (tClass.indexOf("fromTop") != -1) {
                                    t.css({ 'top': '-' + hRel + 'px', 'bottom': 'auto' });
                                    t.css('visibility', 'visible').delay((time / lMoveIn) * (0.1 * (ind - 1))).animate({ 'top': pos.top }, (time / lMoveIn) * 0.2, easeMove);
                                } else if (tClass.indexOf("fromBottom") != -1) {
                                    t.css({ 'top': hRel + 'px', 'bottom': 'auto' });
                                    t.css('visibility', 'visible').delay((time / lMoveIn) * (0.1 * (ind - 1))).animate({ 'top': pos.top }, (time / lMoveIn) * 0.2, easeMove);
                                } else if (tClass.indexOf("fadeIn") != -1) { t.animate({ opacity: 0 }, 0).css('visibility', 'visible').delay((time / lMoveIn) * (0.1 * (ind - 1))).animate({ opacity: 1 }, (time / lMoveIn) * 0.2, easeMove); }
                            });
                        }
                        $('.diapoappended').remove();
                        elem.removeClass('diaposliding');
                        selector.eq(vis).hide();
                        $('#pix_canvas').animate({ opacity: opts.loaderOpacity }, 400);
                        u = setInterval(function() {
                            if (($.browser.msie && $.browser.version < 9) || opts.loader == 'bar') {
                                if (rad <= 1 && !elem.hasClass('stopped')) { rad = rad + 0.01; } else if (rad <= 1 && (elem.hasClass('stopped'))) { rad = rad; } else {
                                    if (!elem.hasClass('stopped'))
                                        imgFake();
                                    clearInterval(u);
                                    $('#pix_canvas').animate({ opacity: 0 }, 200, function() {
                                        setTimeout(canvasLoader, opts.transPeriod + difference);
                                        nextSlide();
                                    });
                                }
                                canvas.css({ 'width': (w * rad) });
                            } else {
                                radNew = rad;
                                ctx.clearRect(0, 0, opts.pieDiameter, opts.pieDiameter);
                                ctx.globalCompositeOperation = 'destination-over';
                                ctx.beginPath();
                                ctx.arc((opts.pieDiameter) / 2, (opts.pieDiameter) / 2, (opts.pieDiameter) / 2 - opts.pieStroke, 0, Math.PI * 2, false);
                                ctx.lineWidth = opts.pieStroke;
                                ctx.strokeStyle = opts.loaderBgColor;
                                ctx.stroke();
                                ctx.closePath();
                                ctx.globalCompositeOperation = 'source-over';
                                ctx.beginPath();
                                ctx.arc((opts.pieDiameter) / 2, (opts.pieDiameter) / 2, (opts.pieDiameter) / 2 - opts.pieStroke, 0, Math.PI * 2 * radNew, false);
                                ctx.lineWidth = opts.pieStroke - 4;
                                ctx.strokeStyle = opts.loaderColor;
                                ctx.stroke();
                                ctx.closePath();
                                if (rad <= 1 && !elem.hasClass('stopped')) { rad = rad + 0.01; } else if (rad <= 1 && (elem.hasClass('stopped'))) { rad = rad; } else {
                                    if (!elem.hasClass('stopped'))
                                        imgFake();
                                    clearInterval(u);
                                    $('#pix_canvas, #pix_canvas_wrap').animate({ opacity: 0 }, 200, function() {
                                        setTimeout(canvasLoader, opts.transPeriod + difference);
                                        nextSlide();
                                    });
                                }
                            }
                        }, (time) * 0.01);
                    }
                }
                if (pagination == true) {
                    $('#pix_pag li').removeClass('diapocurrent');
                    $('#pix_pag li').eq(i).addClass('diapocurrent');
                }
                if (fx == 'scrollLeft' || fx == 'scrollRight' || fx == 'scrollTop' || fx == 'scrollBottom' || fx == 'scrollHorz') {
                    tApp.delay((((opts.transPeriod + difference) / blocks) * delay[index] * couples) * 0.5).css({ 'display': 'block', 'height': height, 'margin-left': marginLeft, 'margin-top': marginTop, 'width': width }).animate({ 'height': Math.floor((h / rows) + addTop + 1), 'margin-top': 0, 'margin-left': 0, 'width': Math.floor((w / cols) + addLeft + 1) }, (opts.transPeriod - difference), easing, diapoeased);
                    selector.eq(vis).delay((((opts.transPeriod + difference) / blocks) * delay[index] * couples) * 0.5).animate({ 'margin-left': marginLeft * (-1), 'margin-top': marginTop * (-1) }, (opts.transPeriod - difference), easing, function() { jQuery(this).css({ 'margin-top': 0, 'margin-left': 0 }); });
                } else {
                    if (slideOn == 'next') { tApp.delay((((opts.transPeriod + difference) / blocks) * delay[index] * couples) * 0.5).css({ 'display': 'block', 'height': height, 'margin-left': marginLeft, 'margin-top': marginTop, 'width': width, 'opacity': 0 }).animate({ 'height': Math.floor((h / rows) + addTop + 1), 'margin-top': 0, 'margin-left': 0, 'opacity': 1, 'width': Math.floor((w / cols) + addLeft + 1) }, (opts.transPeriod - difference), easing, diapoeased); } else {
                        selector.eq(i).show().css('z-index', '999').addClass('diapocurrent');
                        selector.eq(vis).css('z-index', '1').removeClass('diapocurrent');
                        tApp.delay((((opts.transPeriod + difference) / blocks) * delay[index] * couples) * 0.5).css({ 'display': 'block', 'height': Math.floor((h / rows) + addTop + 1), 'margin-top': 0, 'margin-left': 0, 'opacity': 1, 'width': Math.floor((w / cols) + addLeft + 1) }).animate({ 'height': height, 'margin-left': marginLeft, 'margin-top': marginTop, 'width': width, 'opacity': 0 }, (opts.transPeriod - difference), easing, diapoeased);
                    }
                }
                if (navigation == true) {
                    $('#pix_prev')[clickEv](function() {
                        if (!elem.hasClass('diaposliding')) {
                            var idNum = parseFloat($('div.diapocurrent', elem).index());
                            clearInterval(u);
                            imgFake();
                            $('#pix_canvas, #pix_canvas_wrap').animate({ opacity: 0 }, 0);
                            canvasLoader();
                            if (idNum != 0) { nextSlide(idNum); } else { nextSlide(amountSlide); }
                        }
                    });
                    $('#pix_next')[clickEv](function() {
                        if (!elem.hasClass('diaposliding')) {
                            var idNum = parseFloat($('div.diapocurrent', elem).index());
                            clearInterval(u);
                            imgFake();
                            $('#pix_canvas, #pix_canvas_wrap').animate({ opacity: 0 }, 0);
                            canvasLoader();
                            if (idNum == amountSlide - 1) { nextSlide(1); } else { nextSlide(idNum + 2); }
                        }
                    });
                }
                if (isMobile()) {
                    elem.live('swipeleft', function(event) {
                        if (!elem.hasClass('diaposliding')) {
                            var idNum = parseFloat($('div.diapocurrent', elem).index());
                            clearInterval(u);
                            imgFake();
                            $('#pix_canvas, #pix_canvas_wrap').animate({ opacity: 0 }, 0);
                            canvasLoader();
                            if (idNum == amountSlide - 1) { nextSlide(1); } else { nextSlide(idNum + 2); }
                        }
                    });
                    elem.live('swiperight', function(event) {
                        if (!elem.hasClass('diaposliding')) {
                            var idNum = parseFloat($('div.diapocurrent', elem).index());
                            clearInterval(u);
                            imgFake();
                            $('#pix_canvas, #pix_canvas_wrap').animate({ opacity: 0 }, 0);
                            canvasLoader();
                            if (idNum != 0) { nextSlide(idNum); } else { nextSlide(amountSlide); }
                        }
                    });
                }
                if (pagination == true) {
                    $('#pix_pag li')[clickEv](function() {
                        if (!elem.hasClass('diaposliding')) {
                            var idNum = parseFloat($(this).index());
                            var curNum = parseFloat($('div.diapocurrent', elem).index());
                            if (idNum != curNum) {
                                clearInterval(u);
                                imgFake();
                                $('#pix_canvas, #pix_canvas_wrap').animate({ opacity: 0 }, 0);
                                canvasLoader();
                                nextSlide(idNum + 1);
                            }
                        }
                    });
                }
                if (opts.thumbs == true) {
                    $('#pix_pag li .pix_thumb')[clickEv](function() {
                        if (!elem.hasClass('diaposliding')) {
                            var idNum = parseFloat($(this).parents('li').index());
                            var curNum = parseFloat($('div.diapocurrent', elem).index());
                            if (idNum != curNum) {
                                clearInterval(u);
                                imgFake();
                                $('#pix_canvas, #pix_canvas_wrap').animate({ opacity: 0 }, 0);
                                canvasLoader();
                                nextSlide(idNum + 1);
                            }
                        }
                    });
                }
            });
        }
    }
})(jQuery);;

function doPost(form_name) {
    var form = "document." + form_name;
    eval(form).submit();
}

function login_KeyPress(e, form_name) { if (e.keyCode == 13) { doPost(form_name); return false; } }

function closeFancyboxAndRedirectToUrl(url) {
    if ($.fancybox) { if (window.location.pathname != "/public/index/login-popup-new" && window.location.pathname != "/public/index/register-popup") { $.fancybox.close(); } }
    window.location = url;
}

function closeFancybox() { if (window.location.pathname != "/public/index/login-popup-new" && window.location.pathname != "/public/index/register-popup") { $.fancybox.close(); } else { window.location.pathname = "/"; } }

function send_mail_reactive(userid) {
    $.ajax({
        type: "POST",
        url: "/public/register/send-mail-reactive/",
        data: "userid=" + userid,
        success: function(responseText) {
            if (responseText == 'success') {
                $("#thanks_send_button").html('Email berhasil dikirim');
                $("#thanks_send_button").attr('href', 'javascript:void(0);');
            } else {
                alert(responseText);
                window.location = '/';
            }
        }
    });
};;
(function($) {
    var tmp, loading, overlay, wrap, outer, content, close, title, nav_left, nav_right, selectedIndex = 0,
        selectedOpts = {},
        selectedArray = [],
        currentIndex = 0,
        currentOpts = {},
        currentArray = [],
        ajaxLoader = null,
        imgPreloader = new Image(),
        imgRegExp = /\.(jpg|gif|png|bmp|jpeg)(.*)?$/i,
        swfRegExp = /[^\.]\.(swf)\s*$/i,
        loadingTimer, loadingFrame = 1,
        titleHeight = 0,
        titleStr = '',
        start_pos, final_pos, busy = false,
        fx = $.extend($('<div/>')[0], { prop: 0 }),
        isIE6 = $.browser.msie && $.browser.version < 7 && !window.XMLHttpRequest,
        _abort = function() {
            loading.hide();
            imgPreloader.onerror = imgPreloader.onload = null;
            if (ajaxLoader) { ajaxLoader.abort(); }
            tmp.empty();
        },
        _error = function() {
            if (false === selectedOpts.onError(selectedArray, selectedIndex, selectedOpts)) {
                loading.hide();
                busy = false;
                return;
            }
            selectedOpts.titleShow = false;
            selectedOpts.width = 'auto';
            selectedOpts.height = 'auto';
            tmp.html('<p id="fancybox-error">The requested content cannot be loaded.<br />Please try again later.</p>');
            _process_inline();
        },
        _start = function() {
            var obj = selectedArray[selectedIndex],
                href, type, title, str, emb, ret;
            _abort();
            selectedOpts = $.extend({}, $.fn.fancybox.defaults, (typeof $(obj).data('fancybox') == 'undefined' ? selectedOpts : $(obj).data('fancybox')));
            ret = selectedOpts.onStart(selectedArray, selectedIndex, selectedOpts);
            if (ret === false) { busy = false; return; } else if (typeof ret == 'object') { selectedOpts = $.extend(selectedOpts, ret); }
            title = selectedOpts.title || (obj.nodeName ? $(obj).attr('title') : obj.title) || '';
            if (obj.nodeName && !selectedOpts.orig) { selectedOpts.orig = $(obj).children("img:first").length ? $(obj).children("img:first") : $(obj); }
            if (title === '' && selectedOpts.orig && selectedOpts.titleFromAlt) { title = selectedOpts.orig.attr('alt'); }
            href = selectedOpts.href || (obj.nodeName ? $(obj).attr('href') : obj.href) || null;
            if ((/^(?:javascript)/i).test(href) || href == '#') { href = null; }
            if (selectedOpts.type) { type = selectedOpts.type; if (!href) { href = selectedOpts.content; } } else if (selectedOpts.content) { type = 'html'; } else if (href) { if (href.match(imgRegExp)) { type = 'image'; } else if (href.match(swfRegExp)) { type = 'swf'; } else if ($(obj).hasClass("iframe")) { type = 'iframe'; } else if (href.indexOf("#") === 0) { type = 'inline'; } else { type = 'ajax'; } }
            if (!type) { _error(); return; }
            if (type == 'inline') {
                obj = href.substr(href.indexOf("#"));
                type = $(obj).length > 0 ? 'inline' : 'ajax';
            }
            selectedOpts.type = type;
            selectedOpts.href = href;
            selectedOpts.title = title;
            if (selectedOpts.autoDimensions) {
                if (selectedOpts.type == 'html' || selectedOpts.type == 'inline' || selectedOpts.type == 'ajax') {
                    selectedOpts.width = 'auto';
                    selectedOpts.height = 'auto';
                } else { selectedOpts.autoDimensions = false; }
            }
            if (selectedOpts.modal) {
                selectedOpts.overlayShow = true;
                selectedOpts.hideOnOverlayClick = false;
                selectedOpts.hideOnContentClick = false;
                selectedOpts.enableEscapeButton = false;
                selectedOpts.showCloseButton = false;
            }
            selectedOpts.padding = parseInt(selectedOpts.padding, 10);
            selectedOpts.margin = parseInt(selectedOpts.margin, 10);
            tmp.css('padding', (selectedOpts.padding + selectedOpts.margin));
            $('.fancybox-inline-tmp').unbind('fancybox-cancel').bind('fancybox-change', function() { $(this).replaceWith(content.children()); });
            switch (type) {
                case 'html':
                    tmp.html(selectedOpts.content);
                    _process_inline();
                    break;
                case 'inline':
                    if ($(obj).parent().is('#fancybox-content') === true) { busy = false; return; }
                    $('<div class="fancybox-inline-tmp" />').hide().insertBefore($(obj)).bind('fancybox-cleanup', function() { $(this).replaceWith(content.children()); }).bind('fancybox-cancel', function() { $(this).replaceWith(tmp.children()); });
                    $(obj).appendTo(tmp);
                    _process_inline();
                    break;
                case 'image':
                    busy = false;
                    $.fancybox.showActivity();
                    imgPreloader = new Image();
                    imgPreloader.onerror = function() { _error(); };
                    imgPreloader.onload = function() {
                        busy = true;
                        imgPreloader.onerror = imgPreloader.onload = null;
                        _process_image();
                    };
                    imgPreloader.src = href;
                    break;
                case 'swf':
                    selectedOpts.scrolling = 'no';
                    str = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="' + selectedOpts.width + '" height="' + selectedOpts.height + '"><param name="movie" value="' + href + '"></param>';
                    emb = '';
                    $.each(selectedOpts.swf, function(name, val) {
                        str += '<param name="' + name + '" value="' + val + '"></param>';
                        emb += ' ' + name + '="' + val + '"';
                    });
                    str += '<embed src="' + href + '" type="application/x-shockwave-flash" width="' + selectedOpts.width + '" height="' + selectedOpts.height + '"' + emb + '></embed></object>';
                    tmp.html(str);
                    _process_inline();
                    break;
                case 'ajax':
                    busy = false;
                    $.fancybox.showActivity();
                    selectedOpts.ajax.win = selectedOpts.ajax.success;
                    ajaxLoader = $.ajax($.extend({}, selectedOpts.ajax, {
                        url: href,
                        data: selectedOpts.ajax.data || {},
                        error: function(XMLHttpRequest, textStatus, errorThrown) { if (XMLHttpRequest.status > 0) { _error(); } },
                        success: function(data, textStatus, XMLHttpRequest) {
                            var o = typeof XMLHttpRequest == 'object' ? XMLHttpRequest : ajaxLoader;
                            if (o.status == 200) {
                                if (typeof selectedOpts.ajax.win == 'function') { ret = selectedOpts.ajax.win(href, data, textStatus, XMLHttpRequest); if (ret === false) { loading.hide(); return; } else if (typeof ret == 'string' || typeof ret == 'object') { data = ret; } }
                                tmp.html(data);
                                _process_inline();
                            }
                        }
                    }));
                    break;
                case 'iframe':
                    _show();
                    break;
            }
        },
        _process_inline = function() {
            var
                w = selectedOpts.width,
                h = selectedOpts.height;
            if (w.toString().indexOf('%') > -1) { w = parseInt(($(window).width() - (selectedOpts.margin * 2)) * parseFloat(w) / 100, 10) + 'px'; } else { w = w == 'auto' ? 'auto' : w + 'px'; }
            if (h.toString().indexOf('%') > -1) { h = parseInt(($(window).height() - (selectedOpts.margin * 2)) * parseFloat(h) / 100, 10) + 'px'; } else { h = h == 'auto' ? 'auto' : h + 'px'; }
            tmp.wrapInner('<div style="width:' + w + ';height:' + h + ';overflow: ' + (selectedOpts.scrolling == 'auto' ? 'auto' : (selectedOpts.scrolling == 'yes' ? 'scroll' : 'hidden')) + ';position:relative;"></div>');
            selectedOpts.width = tmp.width();
            selectedOpts.height = tmp.height();
            _show();
        },
        _process_image = function() {
            selectedOpts.width = imgPreloader.width;
            selectedOpts.height = imgPreloader.height;
            $("<img />").attr({ 'id': 'fancybox-img', 'src': imgPreloader.src, 'alt': selectedOpts.title }).appendTo(tmp);
            _show();
        },
        _show = function() {
            var pos, equal;
            loading.hide();
            if (wrap.is(":visible") && false === currentOpts.onCleanup(currentArray, currentIndex, currentOpts)) {
                $.event.trigger('fancybox-cancel');
                busy = false;
                return;
            }
            busy = true;
            $(content.add(overlay)).unbind();
            $(window).unbind("resize.fb scroll.fb");
            $(document).unbind('keydown.fb');
            if (wrap.is(":visible") && currentOpts.titlePosition !== 'outside') { wrap.css('height', wrap.height()); }
            currentArray = selectedArray;
            currentIndex = selectedIndex;
            currentOpts = selectedOpts;
            if (currentOpts.overlayShow) {
                overlay.css({ 'background-color': currentOpts.overlayColor, 'opacity': currentOpts.overlayOpacity, 'cursor': currentOpts.hideOnOverlayClick ? 'pointer' : 'auto', 'height': $(document).height() });
                if (!overlay.is(':visible')) {
                    if (isIE6) { $('select:not(#fancybox-tmp select)').filter(function() { return this.style.visibility !== 'hidden'; }).css({ 'visibility': 'hidden' }).one('fancybox-cleanup', function() { this.style.visibility = 'inherit'; }); }
                    overlay.show();
                }
            } else { overlay.hide(); }
            final_pos = _get_zoom_to();
            _process_title();
            if (wrap.is(":visible")) {
                $(close.add(nav_left).add(nav_right)).hide();
                pos = wrap.position(), start_pos = { top: pos.top, left: pos.left, width: wrap.width(), height: wrap.height() };
                equal = (start_pos.width == final_pos.width && start_pos.height == final_pos.height);
                content.fadeTo(currentOpts.changeFade, 0.3, function() {
                    var finish_resizing = function() { content.html(tmp.contents()).fadeTo(currentOpts.changeFade, 1, _finish); };
                    $.event.trigger('fancybox-change');
                    content.empty().removeAttr('filter').css({ 'border-width': currentOpts.padding, 'width': final_pos.width - currentOpts.padding * 2, 'height': selectedOpts.autoDimensions ? 'auto' : final_pos.height - titleHeight - currentOpts.padding * 2 });
                    if (equal) { finish_resizing(); } else {
                        fx.prop = 0;
                        $(fx).animate({ prop: 1 }, { duration: currentOpts.changeSpeed, easing: currentOpts.easingChange, step: _draw, complete: finish_resizing });
                    }
                });
                return;
            }
            wrap.removeAttr("style");
            content.css('border-width', currentOpts.padding);
            if (currentOpts.transitionIn == 'elastic') {
                start_pos = _get_zoom_from();
                content.html(tmp.contents());
                wrap.show();
                if (currentOpts.opacity) { final_pos.opacity = 0; }
                fx.prop = 0;
                $(fx).animate({ prop: 1 }, { duration: currentOpts.speedIn, easing: currentOpts.easingIn, step: _draw, complete: _finish });
                return;
            }
            if (currentOpts.titlePosition == 'inside' && titleHeight > 0) { title.show(); }
            content.css({ 'width': final_pos.width - currentOpts.padding * 2, 'height': selectedOpts.autoDimensions ? 'auto' : final_pos.height - titleHeight - currentOpts.padding * 2 }).html(tmp.contents());
            wrap.css(final_pos).fadeIn(currentOpts.transitionIn == 'none' ? 0 : currentOpts.speedIn, _finish);
        },
        _format_title = function(title) {
            if (title && title.length) {
                if (currentOpts.titlePosition == 'float') { return '<table id="fancybox-title-float-wrap" cellpadding="0" cellspacing="0"><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">' + title + '</td><td id="fancybox-title-float-right"></td></tr></table>'; }
                return '<div id="fancybox-title-' + currentOpts.titlePosition + '">' + title + '</div>';
            }
            return false;
        },
        _process_title = function() {
            titleStr = currentOpts.title || '';
            titleHeight = 0;
            title.empty().removeAttr('style').removeClass();
            if (currentOpts.titleShow === false) { title.hide(); return; }
            titleStr = $.isFunction(currentOpts.titleFormat) ? currentOpts.titleFormat(titleStr, currentArray, currentIndex, currentOpts) : _format_title(titleStr);
            if (!titleStr || titleStr === '') { title.hide(); return; }
            title.addClass('fancybox-title-' + currentOpts.titlePosition).html(titleStr).appendTo('body').show();
            switch (currentOpts.titlePosition) {
                case 'inside':
                    title.css({ 'width': final_pos.width - (currentOpts.padding * 2), 'marginLeft': currentOpts.padding, 'marginRight': currentOpts.padding });
                    titleHeight = title.outerHeight(true);
                    title.appendTo(outer);
                    final_pos.height += titleHeight;
                    break;
                case 'over':
                    title.css({ 'marginLeft': currentOpts.padding, 'width': final_pos.width - (currentOpts.padding * 2), 'bottom': currentOpts.padding }).appendTo(outer);
                    break;
                case 'float':
                    title.css('left', parseInt((title.width() - final_pos.width - 40) / 2, 10) * -1).appendTo(wrap);
                    break;
                default:
                    title.css({ 'width': final_pos.width - (currentOpts.padding * 2), 'paddingLeft': currentOpts.padding, 'paddingRight': currentOpts.padding }).appendTo(wrap);
                    break;
            }
            title.hide();
        },
        _set_navigation = function() {
            if (currentOpts.enableEscapeButton || currentOpts.enableKeyboardNav) {
                $(document).bind('keydown.fb', function(e) {
                    if (e.keyCode == 27 && currentOpts.enableEscapeButton) {
                        e.preventDefault();
                        $.fancybox.close();
                    } else if ((e.keyCode == 37 || e.keyCode == 39) && currentOpts.enableKeyboardNav && e.target.tagName !== 'INPUT' && e.target.tagName !== 'TEXTAREA' && e.target.tagName !== 'SELECT') {
                        e.preventDefault();
                        $.fancybox[e.keyCode == 37 ? 'prev' : 'next']();
                    }
                });
            }
            if (!currentOpts.showNavArrows) {
                nav_left.hide();
                nav_right.hide();
                return;
            }
            if ((currentOpts.cyclic && currentArray.length > 1) || currentIndex !== 0) { nav_left.show(); }
            if ((currentOpts.cyclic && currentArray.length > 1) || currentIndex != (currentArray.length - 1)) { nav_right.show(); }
        },
        _finish = function() {
            if (!$.support.opacity) {
                $('#fancybox-content').css('filter', 0);
                $('#fancybox-wrap').css('filter', 0);
            }
            if (selectedOpts.autoDimensions) { content.css('height', 'auto'); }
            wrap.css('height', 'auto');
            if (titleStr && titleStr.length) { title.show(); }
            if (currentOpts.showCloseButton) { close.show(); }
            _set_navigation();
            if (currentOpts.hideOnContentClick) { content.bind('click', $.fancybox.close); }
            if (currentOpts.hideOnOverlayClick) { overlay.bind('click', $.fancybox.close); }
            $(window).bind("resize.fb", $.fancybox.resize);
            if (currentOpts.centerOnScroll) { $(window).bind("scroll.fb", $.fancybox.center); }
            if (currentOpts.type == 'iframe') { $('<iframe id="fancybox-frame" name="fancybox-frame' + new Date().toISOString().replace(/T.*$/, '') + '" frameborder="0" hspace="0" ' + ($.browser.msie ? 'allowtransparency="true""' : '') + ' scrolling="' + selectedOpts.scrolling + '" src="' + currentOpts.href + '"></iframe>').appendTo(content); }
            wrap.show();
            busy = false;
            $.fancybox.center();
            currentOpts.onComplete(currentArray, currentIndex, currentOpts);
            _preload_images();
        },
        _preload_images = function() {
            var href, objNext;
            if ((currentArray.length - 1) > currentIndex) {
                href = currentArray[currentIndex + 1].href;
                if (typeof href !== 'undefined' && href.match(imgRegExp)) {
                    objNext = new Image();
                    objNext.src = href;
                }
            }
            if (currentIndex > 0) {
                href = currentArray[currentIndex - 1].href;
                if (typeof href !== 'undefined' && href.match(imgRegExp)) {
                    objNext = new Image();
                    objNext.src = href;
                }
            }
        },
        _draw = function(pos) {
            var dim = { width: parseInt(start_pos.width + (final_pos.width - start_pos.width) * pos, 10), height: parseInt(start_pos.height + (final_pos.height - start_pos.height) * pos, 10), top: parseInt(start_pos.top + (final_pos.top - start_pos.top) * pos, 10), left: parseInt(start_pos.left + (final_pos.left - start_pos.left) * pos, 10) };
            if (typeof final_pos.opacity !== 'undefined') { dim.opacity = pos < 0.5 ? 0.5 : pos; }
            wrap.css(dim);
            content.css({ 'width': dim.width - currentOpts.padding * 2, 'height': dim.height - (titleHeight * pos) - currentOpts.padding * 2 });
        },
        _get_viewport = function() { return [$(window).width() - (currentOpts.margin * 2), $(window).height() - (currentOpts.margin * 2), $(document).scrollLeft() + currentOpts.margin, $(document).scrollTop() + currentOpts.margin]; },
        _get_zoom_to = function() {
            var view = _get_viewport(),
                to = {},
                resize = currentOpts.autoScale,
                double_padding = currentOpts.padding * 2,
                ratio;
            if (currentOpts.width.toString().indexOf('%') > -1) { to.width = parseInt((view[0] * parseFloat(currentOpts.width)) / 100, 10); } else { to.width = currentOpts.width + double_padding; }
            if (currentOpts.height.toString().indexOf('%') > -1) { to.height = parseInt((view[1] * parseFloat(currentOpts.height)) / 100, 10); } else { to.height = currentOpts.height + double_padding; }
            if (resize && (to.width > view[0] || to.height > view[1])) {
                if (selectedOpts.type == 'image' || selectedOpts.type == 'swf') {
                    ratio = (currentOpts.width) / (currentOpts.height);
                    if ((to.width) > view[0]) {
                        to.width = view[0];
                        to.height = parseInt(((to.width - double_padding) / ratio) + double_padding, 10);
                    }
                    if ((to.height) > view[1]) {
                        to.height = view[1];
                        to.width = parseInt(((to.height - double_padding) * ratio) + double_padding, 10);
                    }
                } else {
                    to.width = Math.min(to.width, view[0]);
                    to.height = Math.min(to.height, view[1]);
                }
            }
            to.top = parseInt(Math.max(view[3] - 20, view[3] + ((view[1] - to.height - 40) * 0.5)), 10);
            to.left = parseInt(Math.max(view[2] - 20, view[2] + ((view[0] - to.width - 40) * 0.5)), 10);
            return to;
        },
        _get_obj_pos = function(obj) {
            var pos = obj.offset();
            pos.top += parseInt(obj.css('paddingTop'), 10) || 0;
            pos.left += parseInt(obj.css('paddingLeft'), 10) || 0;
            pos.top += parseInt(obj.css('border-top-width'), 10) || 0;
            pos.left += parseInt(obj.css('border-left-width'), 10) || 0;
            pos.width = obj.width();
            pos.height = obj.height();
            return pos;
        },
        _get_zoom_from = function() {
            var orig = selectedOpts.orig ? $(selectedOpts.orig) : false,
                from = {},
                pos, view;
            if (orig && orig.length) {
                pos = _get_obj_pos(orig);
                from = { width: pos.width + (currentOpts.padding * 2), height: pos.height + (currentOpts.padding * 2), top: pos.top - currentOpts.padding - 20, left: pos.left - currentOpts.padding - 20 };
            } else {
                view = _get_viewport();
                from = { width: currentOpts.padding * 2, height: currentOpts.padding * 2, top: parseInt(view[3] + view[1] * 0.5, 10), left: parseInt(view[2] + view[0] * 0.5, 10) };
            }
            return from;
        },
        _animate_loading = function() {
            if (!loading.is(':visible')) { clearInterval(loadingTimer); return; }
            $('div', loading).css('top', (loadingFrame * -40) + 'px');
            loadingFrame = (loadingFrame + 1) % 12;
        };
    $.fn.fancybox = function(options) {
        if (!$(this).length) { return this; }
        $(this).data('fancybox', $.extend({}, options, ($.metadata ? $(this).metadata() : {}))).unbind('click.fb').bind('click.fb', function(e) {
            e.preventDefault();
            if (busy) { return; }
            busy = true;
            $(this).blur();
            selectedArray = [];
            selectedIndex = 0;
            var rel = $(this).attr('rel') || '';
            if (!rel || rel == '' || rel === 'nofollow') { selectedArray.push(this); } else {
                selectedArray = $("a[rel=" + rel + "], area[rel=" + rel + "]");
                selectedIndex = selectedArray.index(this);
            }
            _start();
            return;
        });
        return this;
    };
    $.fancybox = function(obj) {
        var opts;
        if (busy) { return; }
        busy = true;
        opts = typeof arguments[1] !== 'undefined' ? arguments[1] : {};
        selectedArray = [];
        selectedIndex = parseInt(opts.index, 10) || 0;
        if ($.isArray(obj)) {
            for (var i = 0, j = obj.length; i < j; i++) { if (typeof obj[i] == 'object') { $(obj[i]).data('fancybox', $.extend({}, opts, obj[i])); } else { obj[i] = $({}).data('fancybox', $.extend({ content: obj[i] }, opts)); } }
            selectedArray = jQuery.merge(selectedArray, obj);
        } else {
            if (typeof obj == 'object') { $(obj).data('fancybox', $.extend({}, opts, obj)); } else { obj = $({}).data('fancybox', $.extend({ content: obj }, opts)); }
            selectedArray.push(obj);
        }
        if (selectedIndex > selectedArray.length || selectedIndex < 0) { selectedIndex = 0; }
        _start();
    };
    $.fancybox.showActivity = function() {
        clearInterval(loadingTimer);
        loading.show();
        loadingTimer = setInterval(_animate_loading, 66);
    };
    $.fancybox.hideActivity = function() { loading.hide(); };
    $.fancybox.next = function() { return $.fancybox.pos(currentIndex + 1); };
    $.fancybox.prev = function() { return $.fancybox.pos(currentIndex - 1); };
    $.fancybox.pos = function(pos) {
        if (busy) { return; }
        pos = parseInt(pos);
        selectedArray = currentArray;
        if (pos > -1 && pos < currentArray.length) {
            selectedIndex = pos;
            _start();
        } else if (currentOpts.cyclic && currentArray.length > 1) {
            selectedIndex = pos >= currentArray.length ? 0 : currentArray.length - 1;
            _start();
        }
        return;
    };
    $.fancybox.cancel = function() {
        if (busy) { return; }
        busy = true;
        $.event.trigger('fancybox-cancel');
        _abort();
        selectedOpts.onCancel(selectedArray, selectedIndex, selectedOpts);
        busy = false;
    };
    $.fancybox.close = function() {
        busy = true;
        if (currentOpts && false === currentOpts.onCleanup(currentArray, currentIndex, currentOpts)) { busy = false; return; }
        _abort();
        $(close.add(nav_left).add(nav_right)).hide();
        $(content.add(overlay)).unbind();
        $(window).unbind("resize.fb scroll.fb");
        $(document).unbind('keydown.fb');
        content.find('iframe').attr('src', isIE6 && /^https/i.test(window.location.href || '') ? 'javascript:void(false)' : 'about:blank');
        if (currentOpts.titlePosition !== 'inside') { title.empty(); }
        wrap.stop();

        function _cleanup() {
            overlay.fadeOut('fast');
            title.empty().hide();
            wrap.hide();
            $.event.trigger('fancybox-cleanup');
            content.empty();
            currentOpts.onClosed(currentArray, currentIndex, currentOpts);
            currentArray = selectedOpts = [];
            currentIndex = selectedIndex = 0;
            currentOpts = selectedOpts = {};
            busy = false;
        }
        if (currentOpts.transitionOut == 'elastic') {
            start_pos = _get_zoom_from();
            var pos = wrap.position();
            final_pos = { top: pos.top, left: pos.left, width: wrap.width(), height: wrap.height() };
            if (currentOpts.opacity) { final_pos.opacity = 1; }
            title.empty().hide();
            fx.prop = 1;
            $(fx).animate({ prop: 0 }, { duration: currentOpts.speedOut, easing: currentOpts.easingOut, step: _draw, complete: _cleanup });
        } else { wrap.fadeOut(currentOpts.transitionOut == 'none' ? 0 : currentOpts.speedOut, _cleanup); }
    };
    $.fancybox.resize = function() {
        if (overlay.is(':visible')) { overlay.css('height', $(document).height()); }
        $.fancybox.center(true);
    };
    $.fancybox.center = function() {
        var view, align;
        if (busy) { return; }
        align = arguments[0] === true ? 1 : 0;
        view = _get_viewport();
        if (!align && (wrap.width() > view[0] || wrap.height() > view[1])) { return; }
        wrap.stop().animate({ 'top': parseInt(Math.max(view[3] - 20, view[3] + ((view[1] - content.height() - 40) * 0.5) - currentOpts.padding)), 'left': parseInt(Math.max(view[2] - 20, view[2] + ((view[0] - content.width() - 40) * 0.5) - currentOpts.padding)) }, typeof arguments[0] == 'number' ? arguments[0] : 200);
    };
    $.fancybox.init = function() {
        if ($("#fancybox-wrap").length) { return; }
        $('body').append(tmp = $('<div id="fancybox-tmp"></div>'), loading = $('<div id="fancybox-loading"><div></div></div>'), overlay = $('<div id="fancybox-overlay"></div>'), wrap = $('<div id="fancybox-wrap"></div>'));
        outer = $('<div id="fancybox-outer" style="background:transparent;"></div>').append('<div class="fancybox-bg" id="fancybox-bg-n"></div><div class="fancybox-bg" id="fancybox-bg-ne"></div><div class="fancybox-bg" id="fancybox-bg-e"></div><div class="fancybox-bg" id="fancybox-bg-se"></div><div class="fancybox-bg" id="fancybox-bg-s"></div><div class="fancybox-bg" id="fancybox-bg-sw"></div><div class="fancybox-bg" id="fancybox-bg-w"></div><div class="fancybox-bg" id="fancybox-bg-nw"></div>').appendTo(wrap);
        outer.append(content = $('<div id="fancybox-content"></div>'), close = $('<a id="fancybox-close"></a>'), title = $('<div id="fancybox-title"></div>'), nav_left = $('<a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a>'), nav_right = $('<a href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a>'));
        close.click($.fancybox.close);
        loading.click($.fancybox.cancel);
        nav_left.click(function(e) {
            e.preventDefault();
            $.fancybox.prev();
        });
        nav_right.click(function(e) {
            e.preventDefault();
            $.fancybox.next();
        });
        if ($.fn.mousewheel) {
            wrap.bind('mousewheel.fb', function(e, delta) {
                if (busy) { e.preventDefault(); } else if ($(e.target).get(0).clientHeight == 0 || $(e.target).get(0).scrollHeight === $(e.target).get(0).clientHeight) {
                    e.preventDefault();
                    $.fancybox[delta > 0 ? 'prev' : 'next']();
                }
            });
        }
        if (!$.support.opacity) { wrap.addClass('fancybox-ie'); }
        if (isIE6) {
            loading.addClass('fancybox-ie6');
            wrap.addClass('fancybox-ie6');
            $('<iframe id="fancybox-hide-sel-frame" src="' + (/^https/i.test(window.location.href || '') ? 'javascript:void(false)' : 'about:blank') + '" scrolling="no" border="0" frameborder="0" tabindex="-1"></iframe>').prependTo(outer);
        }
    };
    $.fn.fancybox.defaults = { padding: 10, margin: 40, opacity: true, modal: false, cyclic: false, scrolling: 'auto', width: 560, height: 340, autoScale: true, autoDimensions: true, centerOnScroll: false, ajax: {}, swf: { wmode: 'transparent' }, hideOnOverlayClick: true, hideOnContentClick: false, overlayShow: true, overlayOpacity: 0.95, overlayColor: '#fff', titleShow: true, titlePosition: 'float', titleFormat: null, titleFromAlt: false, transitionIn: 'fade', transitionOut: 'fade', speedIn: 300, speedOut: 300, changeSpeed: 300, changeFade: 'fast', easingIn: 'swing', easingOut: 'swing', showCloseButton: false, showNavArrows: true, enableEscapeButton: true, enableKeyboardNav: true, onStart: function() {}, onCancel: function() {}, onComplete: function() {}, onCleanup: function() {}, onClosed: function() {}, onError: function() {} };
    $(document).ready(function() { $.fancybox.init(); });
})(jQuery);;
window.fbAsyncInit = function() { FB.init({ appId: '604761316272742', status: true, cookie: true, xfbml: true, version: 'v4.0' }); };
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.async = true;
    js.src = "https://connect.facebook.net/en_US/all.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
$(function() {
    $('#signup_fb').click(function() { loginFB(); });
    $('#signup_tw').click(function() { if (typeof _gaq != 'undefined' && _gaq) { _gaq.push(['_trackEvent', 'User Logins', 'Login', 'Twitter']); } });

    function loginFB() { $('#signup_fb img')[0].src = "/application/templates/default/default/images/ajax-loader.gif"; if (FB && (FB.getAccessToken() != "" || !FB.getUserID != "")) { if (!isLoginFB()) { FB.login(function(response) { if (response.authResponse) { FB.api('/me', { fields: 'email' }, function(response) { signinfb('fb', FB.getAccessToken()); }); } }, { scope: 'email' }); } } }
});

function isLoginFB(phase) { FB.api('/me', function(response) { if (typeof response.name != 'undefined') { return true; } else return false; }); }

function signinfb(srcFrom, uid) {
    if (typeof srcFrom != 'undefined' && typeof uid != 'undefined') {
        if (srcFrom == 'fb') {
            document.signin.srcFrom.value = srcFrom;
            document.signin.uid.value = uid;
            document.signin.submit();
        }
    }
}

function signinSNS(srcFrom, uid) {
    if (typeof srcFrom != 'undefined' && typeof uid != 'undefined') {
        document.signin.srcFrom.value = srcFrom;
        document.signin.uid.value = uid;
        document.signin.submit();
    }
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function() { console.log('User signed out.'); });
}

function onSignIn(googleUser) {
    var id_token = googleUser.getAuthResponse().id_token;
    var xhr = new XMLHttpRequest();
    signinSNS('gg', id_token);
    signOut();
}

function loginAction(data) {
    var redirect = $("input[name='popup_redirect']").val();
    numTest = parseInt(data);
    if (numTest == 1) { if (redirect == '') { window.location.href = '/public/index/public-survey'; } else { window.location.href = decodeURIComponent(redirect.replace(/\+/g, " ")); } } else if (numTest == 2) { window.location.href = '/public/index/reqinfo'; } else if (numTest == 3) { window.location.href = '/public/index/update-phone'; } else if (numTest == 4) { window.location.href = '/public/index/confirm-new-phone'; } else { $('#error-message').html(data); }
}