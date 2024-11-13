export class Jsonplaceholder {
  constructor(link, limit, place) {
    this.link = link;
    this.limit = "?_limit=" + limit;
    this.place = place;
  }

  ShowText() {
    fetch(this.link + this.limit)
      .then((response) => response.json())
      .then((data) => {
        const sectionTest = document.getElementById(this.place);
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

  ShowImg() {
    fetch(this.link + this.limit)
      .then((response) => response.json())
      .then((data) => {
        const sectionTest = document.getElementById(this.place);
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

export let array = {
  test: "test",
  test1: "autre",
  number1: 10,
  number2: 486,
};

// ---------

export class OtherClass {
  #private_number = 50;
  public_number = 10;
  yy;

  constructor(number) {
    this.number = number;
    this.k;
  }

  calcul(private_number, public_number, number, yy) {
    this.yy = this.#private_number + 10 + this.public_number + this.number;
    return this.yy;
  }

  nocalcul() {
    return this.yy + 2;
  }

  ifif() {
    if (this.yy >= 50) {
      return true;
    } else {
      return false;
    }
  }
}
// ----------

export class TestText {
  constructor(texttitre, para, where) {
    this.texttitre = texttitre;
    this.where = where;
    this.para = para;
  }

  _textInsert() {
    return (document.getElementById(this.where).innerHTML =
      "<h1>" + this.texttitre + "</h1> <p>" + this.para + "</p>");
  }

  textinin() {
    return this._textInsert();
  }
  number() {
    return 45;
  }
}

export class TesTestText extends TestText {
  constructor(texttitre, para, where, other) {
    super(texttitre, para, where);
    this.other = other;
    this.number();
  }

  otherfun(other) {
    return 4 + this.other + this.number();
  }
}
