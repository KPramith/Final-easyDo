function validateForm() {
  var username = document.querySelector('input[name="name"]').value.trim();
  var email = document.querySelector('input[name="email"]').value.trim();
  var phone = document.querySelector('input[name="phone"]').value.trim();
  var message = document.querySelector('textarea[name="message"]').value.trim();

  // Regular Expressions for Validation
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var phonePattern = /^\d{10}$/;  // Assuming a 10-digit phone number

  // Username Validation
  if (username === "") {
      alert("Username cannot be empty.");
      return false;
  }

  // Email Validation
  if (email === "") {
      alert("Email cannot be empty.");
      return false;
  } else if (!emailPattern.test(email)) {
      alert("Please enter a valid email address.");
      return false;
  }

  // Phone Number Validation
  if (phone === "") {
      alert("Phone number cannot be empty.");
      return false;
  } else if (!phonePattern.test(phone)) {
      alert("Please enter a valid phone number (10 digits).");
      return false;
  }

  // Message Validation
  if (message === "") {
      alert("Message cannot be empty.");
      return false;
  }

  return true;  // Proceed with form submission if all validations pass
}
