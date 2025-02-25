<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum</title>
    <style>
      
        .curriculum-container {
            display: flex;
            max-width: 1148px;
            margin: auto;
            background: white;
            border-radius: 12px;
          
            overflow: hidden;
            padding: 20px;
        }
        .sidebar {
            width: 40%;
         
            padding: 20px;
            border-radius: 12px;
        }
        .sidebar div {
            display: flex;
            align-items: center;
            padding: 15px;
            cursor: pointer;
            margin-bottom: 12px;
            border-radius: 8px;
            transition: background 0.3s, transform 0.2s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar div:hover, .sidebar div.active {
            background: #00796b;
            color: white;
            transform: scale(1.05);
        }
        .sidebar img {
            width: 35px;
            margin-right: 12px;
        }
        .content {
            width: 81%;
            padding: 44px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .section-title {
            font-size: 22px;
            font-weight: bold;
            color: #00796b;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center; color: #00796b;">Curriculum</h2>
    <div class="curriculum-container">
        <div class="sidebar">
            <div class="active">
                <img src="https://cdn.pegasus.imarticus.org/FAM/svgs/Group%20(2).svg" alt="Principles Of Accounting">
                Principles Of Accounting
            </div>
            <div>
                <img src="https://cdn.pegasus.imarticus.org/FAM/svgs/Group%20(6).svg" alt="Working Capital Management">
                Working Capital Management
            </div>
            <div>
                <img src="https://cdn.pegasus.imarticus.org/FAM/svgs/Group%20(3).svg" alt="Audit & Taxation">
                Audit & Taxation
            </div>
            <div>
                <img src="https://cdn.pegasus.imarticus.org/FAM/svgs/Group%20(4).svg" alt="Financial Planning And Analysis">
                Financial Planning And Analysis
            </div>
        </div>
        <div class="content">
            <h3 class="section-title">Description</h3>
            <p>This module will explore the fundamentals of accounting in depth and teach you about financial statements and different types of analysis to find insights. It will also explore the accounting standards followed in the industry.</p>
            <h3 class="section-title">Soft Skills</h3>
            <ul>
                <li>Goal setting & time management</li>
                <li>Self introduction, building vocabulary and language skills</li>
                <li>Techniques for persuading and influencing others</li>
            </ul>
            <h3 class="section-title">Domain</h3>
            <ul>
                <li>Principles of Accounting</li>
                <li>Accounting Standards</li>
                <li>Basic & Intermediate Excel</li>
                <li>Overview & Preparation of Financial Statements</li>
            </ul>
            <h3 class="section-title">In-Class Activities, Tools & Case Studies</h3>
            <ul>
                <li>Excel</li>
                <li>Case Study on IND AS</li>
            </ul>
            <h3 class="section-title">Why Focus on PMS Distribution?</h3>
            <p>PMS (Portfolio Management Services) is an essential financial tool for high-net-worth individuals, offering tailored investment strategies. With growing wealth management opportunities, understanding PMS distribution is crucial for financial professionals.</p>
        </div>
    </div>
</body>
</html>