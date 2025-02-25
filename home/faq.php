<div class="el-pricing-wrapper">
  <div class="container">
    <div class="el-team-heading text-center">
      <h4 class="el-top-heading-center">FAQ</h4>
    </div>
    <div class="faq-item">
      <div class="faq-question">Q1: What is the duration of the course?</div>
      <div class="faq-answer">The course spans 60 hours, with weekend classes tailored for working professionals.</div>
    </div>
    <div class="faq-item">
      <div class="faq-question">Q2: Is the course online or offline?</div>
      <div class="faq-answer">The course is conducted via live Zoom sessions, accessible anytime, anywhere.</div>
    </div>
    <div class="faq-item">
      <div class="faq-question">Q3: What certification will I receive?</div>
      <div class="faq-answer">You’ll earn an NISM certification recognized across India’s financial sector.</div>
    </div>
    <div class="faq-item">
      <div class="faq-question">Q4: Can I enroll as a beginner in finance?</div>
      <div class="faq-answer">Yes, the course is designed for both beginners and experienced professionals.</div>
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