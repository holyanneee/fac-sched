$('#updateSubjectModal').on('show.bs.modal', function(event) {
    var sid = $(event.relatedTarget).data('sid');
    $.ajax({
      type: 'POST',
      url: 'bsitprog.php',
      data: {tsasaid: tsasaid},
      success: function(data) {
        $('#ccode').val(data.course_code);
        $('#ctitle').val(data.course_title);
        $('#clec').val(data.Lec);
        $('#clab').val(data.Lab);
        $('#cunit').val(data.unit);
      }
    });
  });
  ``