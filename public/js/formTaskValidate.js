$(document).ready(function() {
    $('#taskForm').validate({
      rules: {
        title: {
          required: true
        },
        user: {
          required: true
        },
        description: {
          required: true
        },
        attachmentFile: {
            required: true
        }
      },
      messages: {
        title: {
            required: "Please, enter the title."
        },
        user: {
            required: "Please, enter the user."
        },
        description: {
            required: "Please, enter the description.",
        },
        attachmentFile: {
            required: "Please, enter the attachment file."
        }
      },
    });
  });
