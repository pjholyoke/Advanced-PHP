<div class="col-md-12 nopad">
  <table class="table table-inverse table-striped table-bordered nopad">
    <thead>
      <th>Name</th>
      <th>Email</th>
      <th>Address</th>
      <th>City</th>
      <th>State</th>
      <th>Zip</th>
      <th>Birthday</th>
    </thead>

    <tbody>
      <?php foreach($addrs as $address) { ?>
        <tr>
          <td><?php echo $address["fullname"]; ?></td>
          <td><?php echo $address["email"]; ?></td>
          <td><?php echo $address["addressline1"]; ?></td>
          <td><?php echo $address["city"]; ?></td>
          <td><?php echo strtoupper($address["state"]); ?></td>
          <td><?php echo $address["zip"]; ?></td>
          <td><?php echo date_format(date_create($address["birthday"]),"d-m-Y"); ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>