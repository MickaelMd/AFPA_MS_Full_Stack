fetch("../data/record.json")
  .then((response) => response.json())
  .then((data) => {
    const discs = data[3].data;

    console.log(discs);
    let i = 0;
    discs.forEach((disc) => {
      i++;
      console.log(i + " " + disc.disc_picture);
    });
  });
