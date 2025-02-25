<style>
    .containertt {
        background: white;
        padding-top: 6%;
        padding-bottom: 6%;
        text-align: center;
    }
    .heading {
        font-size: 28px;
        font-weight: bold;
        color: #333;
        margin-bottom: 30px;
    }
    .steps {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    padding-top: 2%;

}

.step-box {
    background: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    width: 200px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    opacity: 0;
    animation: fadeIn 0.8s ease-in-out forwards;
}

.step-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.step-box .step {
    background: #0a233a;
    color: white;
    display: inline-block;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 10px;
}

.step-box i {
    font-size: 40px;
    color: #00a991;
    margin-bottom: 10px;
    transition: transform 0.3s ease;
}

.step-box:hover i {
    transform: rotate(10deg);
}

    .help-text {
        margin-top: 34px;
        font-size: 14px;
        color: #666;
    }
    .enquire-btn {
        background: #004d3d;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }
    .enquire-btn:hover {
        background: #007b65;
    }
    .enquire-btn-container {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }
</style>

<div class="containertt">
    
    <h4 class="el-top-heading-center heading">Enroll Today</h4>
    <div class="steps">
        <div class="step-box">
            <div class="step">Step 1</div>
            <i class="fas fa-chalkboard-teacher"></i>
            <p>Register for the NISM PMS Certification Exam.</p>
        </div>
        <div class="step-box">
            <div class="step">Step 2</div>
            <i class="fas fa-user-check"></i>
            <p>Access course materials & start learning at your own pace.</p>
        </div>
        <div class="step-box">
            <div class="step">Step 3</div>
            <i class="fas fa-hand-holding-usd"></i>
            <p>Take the online exam & score at least 60% to pass.</p>
        </div>
        <div class="step-box">
            <div class="step">Step 4</div>
            <i class="fas fa-clipboard-list"></i>
            <p>Receive your official NISM PMS Certification & advance your career!</p>
        </div>
    </div>
    <div class="help-text"> Don’t wait! Enhance your portfolio management expertise today!</div>
    <div class="enquire-btn-container">
        <button class="enquire-btn">Enquire Now</button>
    </div>
</div>
