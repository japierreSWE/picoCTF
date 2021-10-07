from hacksport.problem import files_from_directory, PHPApp, ProtectedFile


class Problem(PHPApp):
    files = files_from_directory("source/")
    php_root = "source/"
    num_workers = 5