// ====== Theme setup (JS only) ======
(function () {
  // عناصر تجريبية + زر التبديل
  var title = document.createElement("h2");
  title.innerText = "Dark / Light Mode (JS Only)";

  var p = document.createElement("p");
  p.innerText = "جرّب تبديل الوضع وشوف الألوان والخلفية تتغيّر.";

  var toggleBtn = document.createElement("button");
  toggleBtn.innerText = "Toggle Theme";
  toggleBtn.setAttribute("aria-label", "Toggle color theme");

  var card = document.createElement("div");
  card.innerHTML = "<h3>Card</h3><p>محتوى كارد للتجربة.</p>";

  // تجميع العناصر
  document.body.appendChild(title);
  document.body.appendChild(p);
  document.body.appendChild(toggleBtn);
  document.body.appendChild(card);

  // ستايلات أساسية عبر JS
  document.body.style.margin = "0";
  document.body.style.fontFamily = "system-ui, Arial, sans-serif";
  document.body.style.transition = "background 0.25s, color 0.25s";

  [toggleBtn].forEach(function (b) {
    b.style.padding = "10px 16px";
    b.style.border = "0";
    b.style.borderRadius = "9999px";
    b.style.cursor = "pointer";
    b.style.margin = "16px 0";
    b.style.fontWeight = "600";
    b.style.transition = "background 0.25s, color 0.25s, box-shadow 0.25s";
  });

  [title, p].forEach(function (el) { el.style.margin = "16px"; });

  card.style.margin = "16px";
  card.style.padding = "16px";
  card.style.borderRadius = "16px";
  card.style.transition = "background 0.25s, color 0.25s, box-shadow 0.25s";

  // تعريف الثيمات
  var light = {
    bg: "#f7f7fb",
    text: "#0f172a",
    cardBg: "#ffffff",
    cardShadow: "0 8px 24px rgba(0,0,0,0.08)",
    buttonBg: "#1f6feb",
    buttonText: "#ffffff",
  };

  var dark = {
    bg: "#0b1220",
    text: "#e6e6ef",
    cardBg: "#0f172a",
    cardShadow: "0 8px 24px rgba(0,0,0,0.35)",
    buttonBg: "#3b82f6",
    buttonText: "#0b1220",
  };

  function applyTheme(t) {
    document.body.style.background = t.bg;
    document.body.style.color = t.text;
    card.style.background = t.cardBg;
    card.style.boxShadow = t.cardShadow;
    toggleBtn.style.background = t.buttonBg;
    toggleBtn.style.color = t.buttonText;
  }

  // قراءة التفضيل من LocalStorage أو من النظام
  var saved = localStorage.getItem("theme");
  var prefersDark = window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches;
  var current = saved || (prefersDark ? "dark" : "light");
  applyTheme(current === "dark" ? dark : light);

  // زر التبديل
  toggleBtn.onclick = function () {
    current = current === "dark" ? "light" : "dark";
    applyTheme(current === "dark" ? dark : light);
    localStorage.setItem("theme", current);
    toggleBtn.blur();
  };

  // لو تغيّر تفضيل النظام أثناء التشغيل (اختياري)
  if (window.matchMedia) {
    window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", function (e) {
      if (!localStorage.getItem("theme")) { // احترم النظام فقط إذا المستخدم ما اختارش يدويًا
        current = e.matches ? "dark" : "light";
        applyTheme(current === "dark" ? dark : light);
      }
    });
  }
})();
