<!-- Footer -->
<footer class="main">
<script>document.write(new Date().getFullYear());</script> <strong> <?php echo $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description; ?></strong>
    Developed by
	<a href="http://brikesystems.co.ke"
    	target="_blank">Brike Systems Limited</a>
</footer>
