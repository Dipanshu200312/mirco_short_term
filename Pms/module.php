<style>
    .section-containertt {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #0a233a;
        min-height: 84vh;
        padding: 50px 30px;
    }
    .section-heading {
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
        color: white;
    }
    .grid-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        max-width: 1000px;
        width: 100%;
    }
    .grid-item {
        background: #ffffff;
        padding: 30px;
        border-radius: 15px;
        color: black;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        border: 2px solid transparent;
    }
    .grid-item:hover {
        border-color: #004494;
    }
    .mod {
        font-size: 87%;
    }
    @media (max-width: 900px) {
        .grid-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 600px) {
        .grid-container {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>

<div class="section-containertt">
    <h4 class="section-heading">Training Modules</h4>
    <div class="grid-container">
        <div class="grid-item">
            <div class="default-content">Module 1<br><span class="mod"> Investment Landscape & Market Overview</span></div>
        </div>
        <div class="grid-item">
            <div class="default-content">Module 2<br> <span class="mod">Securities Markets & Asset Classes</span></div>
        </div>
        <div class="grid-item">
            <div class="default-content">Module 3<br><span class="mod">PMS Structures  Discretionary, Non-Discretionary & Advisory</span></div>
        </div>
        <div class="grid-item">
            <div class="default-content">Module 4<br><span class="mod"> Portfolio Management Process & Asset Allocation Strategies</span></div>
        </div>
        <div class="grid-item">
            <div class="default-content">Module 5<br><span class="mod">Risk Management & Performance Evaluation</span></div>
        </div>
        <div class="grid-item">
            <div class="default-content">Module 6<br> <span class="mod">Regulatory Framework & SEBI Compliance</span></div>
        </div>
        <div class="grid-item">
            <div class="default-content">Module 7<br><span class="mod"> Taxation, Governance & Ethical Considerations</span></div>
        </div>
        <div class="grid-item">
            <div class="default-content">Module 8<br><span class="mod">Operational Aspects of PMS & Client Relationship Management</span></div>
        </div>
    </div>
</div>
