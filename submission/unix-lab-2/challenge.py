from hacksport.problem import files_from_directory, PHPApp, ProtectedFile
from os.path import join


class Problem(PHPApp):
    files = files_from_directory("source/")
    php_root = "source/"
    num_workers = 5

    def php_setup(self):
        """
        Setup for php apps
        """

        web_root = join(self.directory, self.php_root)
        self.start_cmd = "export USERNAME=admin; export PASSWORD=sysadmin; " + "uwsgi --protocol=http --plugin php -p {1} --force-cwd {0} --php-allowed-docroot {2} --http-socket-modifier1 14 --php-index index.html --php-index index.php --check-static {0} --static-skip-ext php --logto /dev/null --php-allowed-ext .php --php-allowed-ext .inc".format(
            web_root, self.num_workers, self.directory
        )