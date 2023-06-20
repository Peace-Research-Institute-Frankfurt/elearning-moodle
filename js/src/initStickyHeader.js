// TODO: Rewrite this with IntersectionObserver

export default function initStickyHeader() {
  const htmlEl = document.querySelector("html")
  const headerEl = document.querySelector(".header-main-menubar")
  if (htmlEl.classList.contains("noscroll")) return
  window.addEventListener("scroll", (e) => {
    const y = window.scrollY
    if (y > 121 && window.innerWidth > 768) {
      headerEl.classList.add("stuck")
    } else {
      headerEl.classList.remove("stuck")
    }
  })
}
