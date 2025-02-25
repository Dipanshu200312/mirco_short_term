<div class="el-pricing-wrapper">
  <div class="container">
    <div class="el-team-heading text-center">
      <h4 class="el-top-heading-center">FAQ</h4>
    </div>
    <div class="faq-item">
      <div class="faq-question">🔹 Q1: Is this certification recognized by SEBI?</div>
      <div class="faq-answer">✔ Yes, this certification aligns with SEBI’s regulatory framework for PMS professionals.</div>
    </div>
    <div class="faq-item">
      <div class="faq-question">🔹 Q2: What is the exam format?</div>
      <div class="faq-answer">✔ Multiple-choice questions (MCQs), 2 hours duration, minimum 60% passing score.</div>
    </div>
    <div class="faq-item">
      <div class="faq-question">🔹 Q3: What are the career benefits of this certification?</div>
      <div class="faq-answer">✔ Gain credibility in wealth management, increase job opportunities, and improve client confidence.</div>
    </div>
    <div class="faq-item">
      <div class="faq-question">🔹 Q4: Can I retake the exam if I fail?</div>
      <div class="faq-answer">✔ Yes, candidates can retake the exam after 30 days.</div>
    </div>
  </div>
</div>

<script>
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach(item => {
    item.addEventListener('click', () => {
      faqItems.forEach(i => {
        if (i !== item) i.classList.remove('open');
      });
      item.classList.toggle('open');
    });
  });
</script>