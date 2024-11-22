const mediaQuery = window.matchMedia("(min-width: 400px)");
mediaQuery.matches; // true ou false suivant la taille de l'écran

// --

document.querySelector("button").animate(
  [
    // étapes/keyframes
    { transform: "translateY(0px)" },
    { transform: "translateY(-300px)" },
  ],
  {
    // temporisation
    duration: 1000,
    iterations: Infinity,
  }
);

// https://developer.mozilla.org/fr/docs/Web/API/Element/animate

// https://developer.mozilla.org/en-US/docs/Web/API/Intersection_Observer_API
