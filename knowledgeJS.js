// javascript function for the article description
let articles = [
    { 
        title: 'Introduction to Programming', 
        content: 'Introduction to Programming provides an overview of fundamental programming concepts and techniques. It covers topics such as variables, data types, control structures, functions, and algorithms. This article is ideal for beginners who are interested in learning the basics of programming and building a strong foundation for further study.', 
        tutorialLink: 'https://www.youtube.com/results?search_query=Introduction+to+Programming'
    },
    {
        "title": "Introduction to Artificial Intelligence",
        "content": "Introduction to Artificial Intelligence provides an overview of the field of AI, covering topics such as machine learning, natural language processing, computer vision, and robotics. This article explores the history, applications, and ethical considerations of AI, making it ideal for those interested in understanding the principles and potential of artificial intelligence. It delves into the various AI techniques and algorithms used to mimic human intelligence and solve complex problems. Additionally, it discusses the societal impact of AI on employment, privacy, and ethics, sparking important conversations about responsible AI development and deployment.",
        "tutorialLink": "https://www.youtube.com/results?search_query=Introduction+to+Artificial+Intelligence"
    },
    { 
        title: 'Getting Started with Web Development', 
        content: 'Getting Started with Web Development is a beginner-friendly guide to building websites and web applications. It covers essential technologies such as HTML, CSS, and JavaScript, as well as frameworks and libraries like Bootstrap and jQuery. This article is perfect for individuals looking to launch a career in web development or create their own projects online.', 
        tutorialLink: 'https://www.youtube.com/results?search_query=Getting+Started+with+Web+Development'
    },
    {
        title: "Introduction to Machine Learning",
        content: "Introduction to Machine Learning provides a comprehensive introduction to the principles and techniques of machine learning. It covers topics such as supervised learning, unsupervised learning, reinforcement learning, and deep learning. This article is suitable for beginners looking to understand the fundamentals of machine learning and its applications in various domains. It explains the mathematical concepts behind machine learning algorithms and provides practical examples to illustrate their usage. Furthermore, it discusses common challenges in machine learning, such as overfitting and data quality, and strategies to overcome them.",
        tutorialLink: "https://www.youtube.com/results?search_query=Introduction+to+Machine+Learning"
    },
    { 
        title: 'Exploring Data Science', 
        content: 'Exploring Data Science introduces the field of data science and its applications in various industries. It covers topics such as data analysis, machine learning, data visualization, and predictive modeling. This article is suitable for individuals interested in leveraging data to gain insights, make informed decisions, and drive business success.', 
        tutorialLink: 'https://www.youtube.com/results?search_query=Exploring+Data+Science'
    },
    {
        title: "Introduction to Internet of Things",
        content: "Introduction to Internet of Things explores the concept of IoT and its impact on various industries. It covers topics such as sensors, connectivity, data analytics, and applications of IoT in smart cities, healthcare, agriculture, and more. This article is suitable for those curious about the interconnected world of IoT and its potential to transform our daily lives. It examines the architecture of IoT systems, including edge computing and cloud integration, and discusses IoT security and privacy considerations. Furthermore, it showcases real-world examples of IoT deployments and their benefits, inspiring readers to explore the possibilities of IoT in their own projects.",
        tutorialLink: "https://www.youtube.com/results?search_query=Introduction+to+Internet+of+Things"
    },        
    { 
        title: 'Introduction to Networking', 
        content: 'Introduction to Networking provides an overview of computer networks and their components. It covers topics such as network protocols, IP addressing, subnetting, and network security. This article is ideal for beginners who want to understand how data is transmitted and shared across devices and networks.', 
        tutorialLink: 'https://www.youtube.com/results?search_query=Introduction+to+Networking'
    },
    { 
        title: 'Cybersecurity Basics', 
        content: 'Cybersecurity Basics covers fundamental concepts and principles of cybersecurity. It includes topics such as threat analysis, risk management, encryption, authentication, and incident response. This article is essential for individuals interested in protecting digital assets and mitigating cyber threats in today\'s interconnected world.', 
        tutorialLink: 'https://www.youtube.com/results?search_query=Cybersecurity+Basics'
    },
    { 
        title: 'Introduction to Cloud Computing', 
        content: 'Introduction to Cloud Computing provides an overview of cloud technologies and services. It covers topics such as cloud deployment models, virtualization, scalability, and security. This article is suitable for individuals interested in leveraging the cloud for storage, computing, and hosting applications.', 
        tutorialLink: 'https://www.youtube.com/results?search_query=Introduction+to+Cloud+Computing'
    },

];


// Function to populate the dropdown with article titles
function populateDropdown() {
    let select = document.getElementById('article-select');
    articles.forEach(article => {
        let option = document.createElement('option');
        option.value = article.title;
        option.textContent = article.title;
        select.appendChild(option);
    });
}

// Function to display article info when a title is selected
function displayArticleInfo() {
    let selectedTitle = this.value;
    let article = articles.find(article => article.title === selectedTitle);
    if (article) {
        let articleTitle = document.getElementById('article-title');
        let articleContent = document.getElementById('article-content');
        let tutorialLink = document.getElementById('tutorial-link');
        articleTitle.textContent = article.title;
        articleContent.textContent = article.content;
        tutorialLink.href = article.tutorialLink;
        document.getElementById('article-info').style.display = 'block';
    } else {
        document.getElementById('article-info').style.display = 'none';
    }
}

// Call the function to populate the dropdown when the page loads
window.onload = populateDropdown;

// Add event listener to the dropdown to display article info when a title is selected
document.getElementById('article-select').addEventListener('change', displayArticleInfo);   


    
// JavaScript to toggle visibility of answers
document.addEventListener('DOMContentLoaded', function() {
    let questions = document.querySelectorAll('.question');
    questions.forEach(question => {
        question.addEventListener('click', function() {
            let answer = this.nextElementSibling;
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        });
    });
});
 
 
 // JS function to change background color of the page
 function changeBackgroundColor() {
    var selectedColor = document.getElementById('color').value;
    document.body.style.backgroundColor = selectedColor;
}

// JS function to reset background color to default
function resetBackgroundColor() {
    document.body.style.backgroundColor = ''; 
}

