export default function initHeroVideo() {
  const showTrigger = document.querySelector("#hero-video-show")
  const hideTrigger = document.querySelector("#hero-video-close")
  const videoContainer = document.querySelector("#hero-video-container")

  if (showTrigger && hideTrigger) {
    showTrigger.addEventListener("click", () => {
      videoContainer.classList.add("active")
      hideTrigger.focus({ preventScroll: true })
    })
    hideTrigger.addEventListener("click", () => {
      videoContainer.classList.remove("active")
      showTrigger.focus({ preventScroll: true })
    })

    window.addEventListener("keyup", (e) => {
      console.log(e.key)
      if (e.key === "Escape" && videoContainer.classList.contains("active")) {
        videoContainer.classList.remove("active")
        showTrigger.focus({ preventScroll: true })
      }
    })
  }
}
