<script>
	const delete_notif = () => 
	{
		var element = document.getElementById("notif_container");

		if (element != null)
		{
			setTimeout(() => {element.style.left = "-200vw";}, 2000);
			setTimeout(() => {document.body.removeChild(element);}, 3000);
		}
	}
	delete_notif();
</script>
