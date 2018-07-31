function redirect(site_prefix){
  switch($("#role").val()){
    case "pencaker":
      window.location = site_prefix + "/daftar/pencaker";
      break;
    case "perusahaan":
      window.location = site_prefix + "/daftar/perusahaan";
      break;
    default:
      window.location = site_prefix;
      break;
  }
}
