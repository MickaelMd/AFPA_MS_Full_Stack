import { Jsonplaceholder } from "./classes.js";
import { array } from "./classes.js";
import { OtherClass } from "./classes.js";
import { TestText } from "./classes.js";
import { TesTestText } from "./classes.js";

const jsonPlaceholder = new Jsonplaceholder(
  "https://jsonplaceholder.typicode.com/posts",
  10,
  "test_section_text"
);
jsonPlaceholder.ShowText();

const jsonPlaceholderr = new Jsonplaceholder(
  "https://jsonplaceholder.typicode.com/photos",
  10,
  "test_section_img"
);
jsonPlaceholderr.ShowImg();

// ----------------

console.log(array);

console.log(array["number1"]);

console.log(array.number1);

// -------------------

const OtherC = new OtherClass(12);
console.log(OtherC.calcul());
console.log(OtherC.nocalcul());
console.log(OtherC.ifif());

// -------------

const newnew = new TestText(
  "Test titre",
  "Test paragraphe",
  "test_section_retext"
);

newnew._textInsert();

console.log(newnew.textinin());

const other = new TesTestText(
  "Test titre deux",
  "Test paragraphe deux",
  "test_section_retext",
  8
);
other._textInsert("");

console.log(other.otherfun());
