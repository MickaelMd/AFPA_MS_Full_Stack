// function problem(x) {
//   if (typeof x == "string") {
//     return "Error";
//   } else {
//     return x * 50 + 6;
//   }
// }

// console.log(problem(45));

// ----------------

// function pipeFix(numbers) {
//   let array = [];
//   let min = Math.min.apply(this, numbers);
//   let max = Math.max.apply(this, numbers);
//   for (let i = min; i < max + 1; i++) {
//     array.push(i);
//   }
//   return array;
// }

// console.log(pipeFix([1, 3, 5, 6, 7, 8]));

// ---

// let max = Math.max.apply(this, [15, 48, 5, 45]);
// let min = Math.min.apply(this, [15, 48, 5, 45]);

// console.log(min + " - " + max);

// ----------------

// const min = function (list) {
//   let min = Math.min.apply(this, list);

//   return min;
// };

// const max = function (list) {
//   let max = Math.max.apply(this, list);

//   return max;
// };

// console.log(min([4, 6, 2, 1, 9, 63, -134, 566]));

// ----------------

// function repeatStr(n, s) {
//   let string = "";
//   for (let i = 0; i < n; i++) {
//     string = string + s;
//   }
//   return string;
// }
//                                             -> return str.repeat(n); <-
// console.log(repeatStr(6, "I"));

// =====> function repeatStr(n, str)
//          {
//              return str.repeat(n);
//                  }

// ----------------

// class Kata {
//   getVolumeOfCuboid(length, width, height) {
//     return length * width * height;
//   }
// }

// ---

// class Kata {
// static getVolumeOfCuboid(length, width, height) {
//   return length * width * height;
// }
//   }

// ---

// const ex = new Kata();
// const exex = ex.getVolumeOfCuboid(45, 12, 28);

// console.log(exex);

// ----------------

// function noBoringZeros(n) {
//   const convert = n.toString();
//   const replace = convert.replace(/0+$/, "");
//   return Number(replace);
// }

// console.log(noBoringZeros(906000));

// ----------------

// function sumMix(x) {
//   let calcul = 0;

//   for (const element of x) {
//     if ((element.type = "string")) {
//       let newn = parseInt(element);
//       calcul += newn;
//     } else {
//       calcul += element;
//     }
//   }
//   return calcul;
// }

// console.log(sumMix(["5", "0", 9, 3, 2, 1, "9", 6, 7]));

// ----------------

// function rgb(r, g, b) {
//   r = r > 255 ? 255 : r;
//   r = r < 0 ? 0 : r;

//   g = g > 255 ? 255 : g;
//   g = g < 0 ? 0 : g;

//   b = b > 255 ? 255 : b;
//   b = b < 0 ? 0 : b;

//   return ((1 << 24) + (r << 16) + (g << 8) + b)
//     .toString(16)
//     .slice(1)
//     .toUpperCase();
// }

// console.log(rgb(300, 255, 255));

// ----------------

// function findMissingLetter(array) {
//   for (let i = 0; i < array.length - 1; i++) {
//     if (array[i].charCodeAt(0) + 1 !== array[i + 1].charCodeAt(0)) {
//       return String.fromCharCode(array[i].charCodeAt(0) + 1);
//     }
//   }
// }

// console.log(findMissingLetter(["a", "b", "c", "d", "f"]));

// ----------------

// function removeUrlAnchor(url) {
//   return url.split("#")[0];
// }

// console.log(removeUrlAnchor("www.codewars.com#about"));

// ----------------

// function removeExclamationMarks(s) {
//   return s.replace(/!/g, "");
// }

// console.log(removeExclamationMarks("!Hello! World!"));

// ----------------

// function abbrevName(name) {
//   return (
//     name.split(" ")[0][0].toUpperCase() +
//     "." +
//     name.split(" ")[1][0].toUpperCase()
//   );
// }

// console.log(abbrevName("sam harris"));

// ----------------

// function howMuchILoveYou(nbPetals) {
//   const p = [
//     "I love you",
//     "a little",
//     "a lot",
//     "passionately",
//     "madly",
//     "not at all",
//   ];

//   const loop = nbPetals;

//   if (nbPetals > p.length) {
//     for (let i = 0; i < loop; i++) {
//       if (nbPetals > p.length) {
//         nbPetals = nbPetals - p.length;
//       }
//     }
//   }

//   return p[nbPetals - 1];
//   // return p[(nbPetals - 1) % 6];
// }

// console.log(howMuchILoveYou(1058));

// ----------------

// function rentalCarCost(d) {
//   if (d < 3) {
//     return d * 40;
//   }
//   if (d >= 3 && d < 7) {
//     return d * 40 - 20;
//   }
//   if (d >= 7) {
//     return d * 40 - 50;
//   }
// }

// console.log(rentalCarCost(10));

// ----------------

// function twiceAsOld(dadYearsOld, sonYearsOld) {
//   if (dadYearsOld >= 2 * sonYearsOld) {
//     return dadYearsOld - 2 * sonYearsOld;
//   } else {
//     return 2 * sonYearsOld - dadYearsOld;
//   }
// }

// console.log(twiceAsOld(55, 30));

// ----------------

// function square(no) {
//   return no * no;
// }

// ----------------