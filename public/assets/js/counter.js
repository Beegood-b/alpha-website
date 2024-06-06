export function startCounter(valueDisplay) {
  let startValue = 0;
  let endValue = parseInt(valueDisplay.getAttribute('data-val'));
  if (!endValue || isNaN(endValue)) return;
  let duration = Math.floor(interval / endValue);
  let counter = setInterval(function () {
    startValue += 1;
    valueDisplay.textContent = startValue;
    if (startValue === endValue) {
      clearInterval(counter);
    }
  }, duration);
}

// Create an Intersection Observer instance
let observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      // If the target element is intersecting with the viewport
      // Start the counter
      startCounter(entry.target);
      // Stop observing once started
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.5 }); // Adjust the threshold as needed

// Get all the elements with class 'num'
let valueDisplays = document.querySelectorAll('.num');
let interval = 4000;

// Observe each element with class 'num'
valueDisplays.forEach(valueDisplay => {
  observer.observe(valueDisplay);
});