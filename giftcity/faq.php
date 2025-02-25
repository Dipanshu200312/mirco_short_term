<div class="el-pricing-wrapper">
  <div class="container">
    <div class="el-team-heading text-center">
      <h4 class="el-top-heading-center">FAQ</h4>
    </div>
    <div class="faq-item">
      <div class="faq-question">🔹 What is GIFT City?</div>
      <div class="faq-answer">GIFT City is India's first international financial hub, offering global investment opportunities, tax benefits, and simplified regulatory frameworks.</div>
    </div>
    <div class="faq-item">
      <div class="faq-question">🔹 Who can benefit from this certification?</div>
      <div class="faq-answer">✔️ Mutual Fund Distributors (MFDs)<br>✔️ Wealth Managers & Investment Advisors<br>✔️ Chartered Accountants & Tax Consultants<br>✔️ Banking & NBFC Professionals</div>
    </div>
    <div class="faq-item">
      <div class="faq-question">🔹 Will I receive an industry-recognized certification?</div>
      <div class="faq-answer">Yes! You’ll earn a prestigious GIFT City Certification, widely valued in the finance industry.</div>
    </div>
    <div class="faq-item">
      <div class="faq-question">🔹 How long is the course?</div>
      <div class="faq-answer">The course is short-term, intensive, and designed for immediate application in real-world finance scenarios.</div>
    </div>
    <div class="faq-item">
      <div class="faq-question">🔹 Is there a deadline for enrollment?</div>
      <div class="faq-answer">Yes! Seats are limited, and prices are increasing soon. Register now!</div>
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
