export const preLoader = function () {
  document.addEventListener("DOMContentLoaded", function () {
    // Retrieve the last visit timestamp from local storage
    const lastVisit = localStorage.getItem('lastVisit');
    const now = new Date();
    // Define the time interval for one hour
    const oneHour = 60 * 60 * 1000;

    // Check if no last visit or if it's been more than an hour
    if (!lastVisit || (now - new Date(lastVisit)) > oneHour) {
      localStorage.setItem('lastVisit', now);
      startLoader(); // Start loader if more than an hour has passed
    } else {
      // Hide loader elements if last visit was within the last hour
      document.querySelector('.overlay').style.display = 'none';
      document.querySelector('.counter-loader').style.display = 'none';
      document.querySelector('.logo-loader').style.display = 'none';
      document.querySelector('.swiper').style.transform = 'scale(1)';
      document.querySelectorAll('.swiper h2').forEach(header => {
        header.style.opacity = '1';
      });
    }
  });

  function startLoader() {
    splitTextIntoSpans(".logo-loader h1");

    gsap.to(".img-holder img", {
      left: 0,
      stagger: 0.1,
      ease: "power4.out",
      duration: 2,
      delay: 3,
    });

    gsap.to(".img-holder img", {
      left: "110%",
      stagger: -0.1,
      ease: "power4.out",
      duration: 2,
      delay: 7,
    });

    var counterElement = document.querySelector(".counter-loader p");
    var logoElement = document.querySelector(".logo-loader h1");
    var currentValue = 0;

    function updateCounter() {
      if (currentValue === 100) {
        animateText();
        return;
      }

      currentValue += Math.floor(Math.random() * 10) + 1;
      currentValue = currentValue > 100 ? 100 : currentValue;
      counterElement.innerHTML =
        currentValue
          .toString()
          .split("")
          .map((char) => `<span>${char}</span>`)
          .join("") + "<span>%</span>";

      var delay = Math.floor(Math.random() * 200) + 100;
      setTimeout(updateCounter, delay);
    }

    function animateText() {
      setTimeout(() => {
        gsap.to(".counter-loader p span", {
          top: "-200px",
          stagger: 0.1,
          ease: "power3.inOut",
          duration: 1,
        });

        gsap.to(".logo-loader h1 span", {
          top: "0",
          stagger: 0.1,
          ease: "power3.inOut",
          duration: 1,
        });

        gsap.to(".logo-loader h1 span", {
          top: "-200px",
          stagger: 0.1,
          ease: "power3.inOut",
          duration: 1,
          delay: 2.5,
        });

        gsap.to(".overlay", {
          opacity: 0,
          ease: "power3.InOut",
          duration: 1,
          delay: 3,
          onComplete: function () {
            document.querySelector('.overlay').style.pointerEvents = 'none';
          }
        });

        gsap.to(".swiper", {
          scale: 1,
          ease: "power3.inOut",
          duration: 1,
          delay: 3.5,
        });

        gsap.to(".swiper h2", {
          opacity: 1,
          stagger: 0.1,
          ease: "power3.inOut",
          duration: 1,
          delay: 4,
        });
      }, 300);
    }

    updateCounter();
  }

  function splitTextIntoSpans(selector) {
    var element = document.querySelector(selector);
    if (element) {
      var text = element.innerText;
      var splitText = text
        .split("")
        .map((char) => `<span>${char}</span>`)
        .join("");
      element.innerHTML = splitText;
    }
  }
}