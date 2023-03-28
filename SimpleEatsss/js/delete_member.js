function setMemberId(memberId) {
    document.getElementById("member-id").value = memberId;
}

document.getElementById("delete-member-btn").addEventListener("click", function() {
    var memberId = document.getElementById("member-id").value;
    window.location.href = "process_delete_member.php?id=" + memberId;
});

