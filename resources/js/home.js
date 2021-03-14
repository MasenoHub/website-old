import { Controller, Scene } from "scrollmagic";
import { CountUp } from "countup.js";

const eventCounter = new CountUp("event-counter", events);
const projectCounter = new CountUp("project-counter", projects);
const questionCounter = new CountUp("question-counter", questions);
const postCounter = new CountUp("post-counter", posts);

const controller = new Controller();

const scene = new Scene({
    triggerElement: "#stats",
})
    .on("enter", (e) => {
        eventCounter.start();
        projectCounter.start();
        questionCounter.start();
        postCounter.start();

        scene.destroy();
    })
    .setPin("#stats")
    .addTo(controller);
