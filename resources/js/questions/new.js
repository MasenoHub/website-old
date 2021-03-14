import Quill from "quill";

const quill = new Quill("#body", {
    placeholder: 'Give additional information that would enable respondents to understand your question.',
    theme: "snow"
});

const form = document.getElementById("question");
const body = document.querySelector("input[name=body]");

form.onsubmit = function() {
    body.value = JSON.stringify(quill.getContents());
    return true;
};
