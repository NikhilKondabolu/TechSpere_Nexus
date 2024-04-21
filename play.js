var count = 1; // global variable to keep count
var topicCounts = {}; // variable to store topic counts

function start() {
    document.getElementById("play").addEventListener("click", displayTable, false);
    document.getElementById("retry").addEventListener("click", function () { location.reload(); }, false);
}

function displayTable() {
    // Display the table
    document.getElementById("poll-table").style.display = "table";

    // Call getTopic to populate table
    getTopic();
}

function getTopic() {
    let result = "";
    count >= 10 ? document.getElementById("play").disabled = true : document.getElementById("play").disabled = false;

    let tableBody = document.getElementById("tablebody");
    let row = document.createElement("tr");

    // Trail #
    let trailCell = document.createElement("td");
    trailCell.innerHTML = count++;
    row.appendChild(trailCell);

    // Topic
    let resultCell = document.createElement("td");
    result = getRandomTopic();
    resultCell.innerHTML = result;
    row.appendChild(resultCell);

    // Update topic counts
    if (topicCounts[result]) {
        topicCounts[result]++;
    } else {
        topicCounts[result] = 1;
    }

    tableBody.appendChild(row);

    // Display topic counts table
    displayTopicCounts();
}

function getRandomTopic() {
    let topics = ["AI", "ML", "Cloud", "IoT"];
    let randomIndex = Math.floor(Math.random() * topics.length);
    return topics[randomIndex];
}

function displayTopicCounts() {
    let topicCountsTableBody = document.getElementById("topicCountsBody");

    // Clear previous data
    topicCountsTableBody.innerHTML = "";

    // Populate table with topic counts
    for (let topic in topicCounts) {
        let row = document.createElement("tr");
        let topicCell = document.createElement("td");
        let countCell = document.createElement("td");
        topicCell.innerHTML = topic;
        countCell.innerHTML = topicCounts[topic];
        row.appendChild(topicCell);
        row.appendChild(countCell);
        topicCountsTableBody.appendChild(row);
    }
}

window.addEventListener("load", start, false);
