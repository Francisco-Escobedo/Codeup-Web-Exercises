var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];
console.log(color);

switch (color) {
    case "red":
        console.log("Stop signs are red");
        break;
    case "orange":
        console.log("Rubber duck's beaks are orange")
        break;
    case "yellow":
        console.log("Taxi cabs are (often) yellow")
        break;
    case "green":
        console.log("Evergreen trees are green")
        break;
    case "blue":
        console.log("Wavelength of 450-495 nm is blue")
        break;
    default:
        console.log("I do not know anything by that color");
    }



    // todo: create a case statement that will handle every color except indigo and violet
    // todo: when a color is encountered log a message that tells the color, and an object of that color
    //       example: Blue is the color of the sky.

    // todo: create a default case that will catch indigo and violet
    // todo: for the default case, log: I do not know anything by that color.