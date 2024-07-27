// server.js
// import express from "express";
const express = require('express');
const path = require('path')
const app = express();
const port = 3000;

const questions = [
    {
        question: "What is the capital of France?",
        options: ["Berlin", "Madrid", "Paris", "Rome"],
        answer: "Paris"
    },
    {
        question: "What is 2 + 2?",
        options: ["3", "4", "5", "6"],
        answer: "4"
    },
    // Add more questions as needed
];

app.get('/api/questions', (req, res) => {
    res.json(questions);
});

app.get("/", (req, res) => {
    res.sendFile(path.join(process.cwd(), "index.html"))
})

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});
