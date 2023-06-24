import initCookiePopup from "./initCookiePopup"
import initHeroVideo from "./initHeroVideo"
import initStickyHeader from "./initStickyHeader"

window.addEventListener("DOMContentLoaded", () => {
  const images = document.querySelectorAll("img")

  images.forEach((img) => {
    if (img.complete) {
      img.classList.add("loaded")
    }
    img.addEventListener("load", () => {
      img.classList.add("loaded")
    })
  })

  initStickyHeader()
  initHeroVideo()
  initCookiePopup()
})
