export class Jsonplaceholder {
  constructor(link) {
    this.link = link;
  }

  show() {
    fetch(this.link)
      .then((response) => response.json())
      .then((data) => {
        const sectionTest = document.getElementById("testt_section");
        sectionTest.innerHTML = "";

        data.forEach((post) => {
          const titleElement = document.createElement("h1");
          titleElement.innerHTML = `${post.title} -/- ${post.id}`;
          sectionTest.appendChild(titleElement);
        });
      })
      .catch((error) => {
        console.error("Erreur:", error);
      });
  }

  showdeux() {
    fetch(this.link)
      .then((response) => response.json())
      .then((data) => {
        const sectionTest = document.getElementById("test_section");
        sectionTest.innerHTML = "";

        data.forEach((post) => {
          const linkElement = document.createElement("a");
          linkElement.href = post.url;

          const imgElement = document.createElement("img");
          imgElement.src = post.url;

          imgElement.classList.add("img");

          linkElement.appendChild(imgElement);
          sectionTest.appendChild(linkElement);
        });
      })
      .catch((error) => {
        console.error("Erreur:", error);
      });
  }
}
