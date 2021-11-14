from hacksport.docker import DockerChallenge, Custom

class Problem(DockerChallenge):

    def setup(self):
        self.ports = {
                80: Custom("http://{host}:{{port}}", "Website")
                }

        self.initialize_docker({})