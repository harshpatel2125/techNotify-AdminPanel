$(document).ready(function()
{
	$("#change-pass").click(function()
	{
		$(".edit-profile-form").addClass("d-none");
		$(".change-password-form").removeClass("d-none");
	});

	$("#edit-pro").click(function()
	{
		$(".change-password-form").addClass("d-none");
		$(".edit-profile-form").removeClass("d-none");
	});
});