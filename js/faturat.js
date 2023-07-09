document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('productForm');
    const businessNameInput = document.getElementById('businessNameInput');
    const businessAddressInput = document.getElementById('businessAddressInput');
    const phoneInput = document.getElementById('phoneInput');
    const emailInput = document.getElementById('emailInput');
    const websiteInput = document.getElementById('websiteInput');
    const taxNumberInput = document.getElementById('taxNumberInput');
    const bankAccountInput = document.getElementById('bankAccountInput');
    const artikullInputs = document.getElementsByName('artikull[]');
    const emerimiInputs = document.getElementsByName('emerimi[]');
    const sasiaInputs = document.getElementsByName('sasia[]');
    const njesiaMatseInputs = document.getElementsByName('njesia_matse[]');
    const cmimiInputs = document.getElementsByName('cmimi[]');
    const totalInputs = document.getElementsByName('total[]');
  
    function check(event) {
      if (businessNameInput.value.trim() === '') {
        const errorContainer = document.querySelector('.error.businessName');
        errorContainer.textContent = 'Emri nuk mund të jetë bosh';
        event.preventDefault();
        return;
      }
  
      if (businessAddressInput.value.trim() === '') {
        const errorContainer = document.querySelector('.error.businessAddress');
        errorContainer.textContent = 'Adresa nuk mund të jetë boshe';
        event.preventDefault();
        return;
      }

      if (taxNumberInput.value.trim() === '') {
        const errorContainer = document.querySelector('.error.taxNumberInput');
        errorContainer.textContent = 'Numri i taksës nuk duhet të jetë bosh';
        event.preventDefault();
        return;
      }
  
      if (bankAccountInput.value.trim() === '') {
        const errorContainer = document.querySelector('.error.bankAccountInput');
        errorContainer.textContent = 'Llogaria e biznesit tuaj nuk duhet të jetë bosh';
        event.preventDefault();
        return;
      }
  
      if (phoneInput.value.trim() === '') {
        const errorContainer = document.querySelector('.error.phone');
        errorContainer.textContent = 'Numri nuk duhet të jetë bosh';
        event.preventDefault();
        return;
      }
  
      if (emailInput.value.trim() === '') {
        const errorContainer = document.querySelector('.error.email');
        errorContainer.textContent = 'Emaili nuk duhet të jetë bosh';
        event.preventDefault();
        return;
      }
  
      if (websiteInput.value.trim() === '') {
        const errorContainer = document.querySelector('.error.websiteInput');
        errorContainer.textContent = 'Website nuk duhet të jetë bosh';
        event.preventDefault();
        return;
      }
  
   
  
      let hasError = false;
  
      for (let i = 0; i < artikullInputs.length; i++) {
        const artikullInput = artikullInputs[i];
        const emerimiInput = emerimiInputs[i];
        const sasiaInput = sasiaInputs[i];
        const njesiaMatseInput = njesiaMatseInputs[i];
        const cmimiInput = cmimiInputs[i];
  
        if (artikullInput.value.trim() === '') {
          const errorContainer = document.querySelector('.error.artikull');
          artikullInput.style.borderColor = 'red';
          hasError = true;
        }
  
        if (emerimiInput.value.trim() === '') {
          const errorContainer = document.querySelector('.error.emerimi');
          emerimiInput.style.borderColor = 'red';
          hasError = true;
        }
  
        if (sasiaInput.value.trim() === '') {
          const errorContainer = document.querySelector('.error.sasia');
          sasiaInput.style.borderColor = 'red';
          hasError = true;
        }
  
        if (njesiaMatseInput.value.trim() === '') {
          const errorContainer = document.querySelector('.error.njesia_matse');
          njesiaMatseInput.style.borderColor = 'red';
          hasError = true;
        }
  
        if (cmimiInput.value.trim() === '') {
          const errorContainer = document.querySelector('.error.cmimi');
          cmimiInput.style.borderColor = 'red';
          hasError = true;
        }
      }
  
      if (hasError) {
        event.preventDefault();
        return;
      }
    }
  
    function calculateTotal() {
        for (let i = 0; i < sasiaInputs.length; i++) {
          const sasiaInput = sasiaInputs[i];
          const cmimiInput = cmimiInputs[i];
          const totalInput = totalInputs[i];
      
          const sasiaValue = parseFloat(sasiaInput.value);
          const cmimiValue = parseFloat(cmimiInput.value);
          const totalValue = sasiaValue * cmimiValue;
          totalInput.value = isNaN(totalValue) ? '' : totalValue.toFixed(2);
        }
      }
  
    form.addEventListener('submit', function (event) {
      check(event);
    });
  
    businessNameInput.addEventListener('input', function () {
      const errorContainer = document.querySelector('.error.businessName');
      errorContainer.textContent = '';
    });
  
    businessAddressInput.addEventListener('input', function () {
      const errorContainer = document.querySelector('.error.businessAddress');
      errorContainer.textContent = '';
    });
  
    phoneInput.addEventListener('input', function () {
      const errorContainer = document.querySelector('.error.phone');
      errorContainer.textContent = '';
    });
  
    emailInput.addEventListener('input', function () {
      const errorContainer = document.querySelector('.error.email');
      errorContainer.textContent = '';
    });
  
    websiteInput.addEventListener('input', function () {
      const errorContainer = document.querySelector('.error.websiteInput');
      errorContainer.textContent = '';
    });
  
    taxNumberInput.addEventListener('input', function () {
      const errorContainer = document.querySelector('.error.taxNumberInput');
      errorContainer.textContent = '';
    });
  
    bankAccountInput.addEventListener('input', function () {
      const errorContainer = document.querySelector('.error.bankAccountInput');
      errorContainer.textContent = '';
    });
  
    for (let i = 0; i < artikullInputs.length; i++) {
      const artikullInput = artikullInputs[i];
      const emerimiInput = emerimiInputs[i];
      const sasiaInput = sasiaInputs[i];
      const njesiaMatseInput = njesiaMatseInputs[i];
      const cmimiInput = cmimiInputs[i];
  
      artikullInput.addEventListener('input', function () {
        const errorContainer = document.querySelector('.error.artikull');
        errorContainer.textContent = '';
        artikullInput.style.borderColor = 'black';
      });
  
      emerimiInput.addEventListener('input', function () {
        const errorContainer = document.querySelector('.error.emerimi');
        errorContainer.textContent = '';
        emerimiInput.style.borderColor = 'black';
      });
  
      sasiaInput.addEventListener('input', function () {
        const errorContainer = document.querySelector('.error.sasia');
        errorContainer.textContent = '';
        sasiaInput.style.borderColor = 'black';
        calculateTotal();
      });
  
      njesiaMatseInput.addEventListener('input', function () {
        const errorContainer = document.querySelector('.error.njesia_matse');
        errorContainer.textContent = '';
        njesiaMatseInput.style.borderColor = 'black';
      });
  
      cmimiInput.addEventListener('input', function () {
        const errorContainer = document.querySelector('.error.cmimi');
        errorContainer.textContent = '';
        cmimiInput.style.borderColor = 'black';
        calculateTotal();
      });
    }
  });
  