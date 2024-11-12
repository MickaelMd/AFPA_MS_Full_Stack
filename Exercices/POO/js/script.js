import { Jsonplaceholder } from "./classes.js";

const jsonPlaceholder = new Jsonplaceholder(
  "https://jsonplaceholder.typicode.com/posts?_limit=10"
);
jsonPlaceholder.show();

const jsonPlaceholderr = new Jsonplaceholder(
  "https://jsonplaceholder.typicode.com/photos?_limit=200"
);
jsonPlaceholderr.showdeux();

const imgElements = document.getElementsByClassName("img");

for (let imgElement of imgElements) {
  imgElement.addEventListener("mouseover", () => {
    console.log("test");
  });
}
