import React, { Component } from "react"

class Task2 extends Component {
  constructor(props) {
    super(props)
    this.state = {
      images: [
        "https://th.bing.com/th/id/R.a2fe98457876c089b675849c6856277a?rik=Lnd2IeA6j%2fr1YA&riu=http%3a%2f%2fpngimg.com%2fuploads%2fsnowman%2fsnowman_PNG9938.png&ehk=mH23ltMFV76tNOijXsh7cbZ3XdYHc1AdVX2Dn8O%2fssI%3d&risl=&pid=ImgRaw&r=0",
        "https://th.bing.com/th/id/OIP.bP6KpnyE3QI25hliQhJuzgHaGq?rs=1&pid=ImgDetMain",
        "https://st.depositphotos.com/1793519/3421/i/450/depositphotos_34217503-stock-photo-3d-snowman-looking-up-and.jpg",
        "https://th.bing.com/th/id/R.418079f0618ec9e59da81a9bd6cf2839?rik=OPSE%2b2vNu1VQbQ&riu=http%3a%2f%2fstatic6.businessinsider.com%2fimage%2f53a1f8176bb3f7e6106c6f1c%2fthe-20-cutest-wild-animals-on-earth.jpg&ehk=rSwceA%2fqPwbnrTl0DQO8fYNMo2pvQnNzuZET9SjbWgs%3d&risl=1&pid=ImgRaw&r=0",
        "https://th.bing.com/th/id/R.edbcae95442b78c307b1aafbd8d5bdb3?rik=FBwNxmcGBS7Avg&pid=ImgRaw&r=0",
      ],
      currentIndex: 0,
      isPlaying: false,
    }
  }

  componentDidMount() {
    this.startSlider()
  }

  componentWillUnmount() {
    this.stopSlider()
  }

  startSlider = () => {
    this.sliderInterval = setInterval(this.goToNextImage, 2000)
  }

  stopSlider = () => {
    clearInterval(this.sliderInterval)
  }

  goToNextImage = () => {
    const { currentIndex, images } = this.state
    this.setState({
      currentIndex: (currentIndex + 1) % images.length,
    })
  }

  goToPrevImage = () => {
    const { currentIndex, images } = this.state
    this.setState({
      currentIndex: (currentIndex - 1 + images.length) % images.length,
    })
  }

  togglePlayPause = () => {
    const { isPlaying } = this.state
    if (isPlaying) {
      this.stopSlider()
    } else {
      this.startSlider()
    }
    this.setState({ isPlaying: !isPlaying })
  }

  render() {
    const { images, currentIndex, isPlaying } = this.state

    return (
      <div className="container">
        <div className="row">
          <div className="col-md-6 offset-md-3 text-center">
            <img
              src={images[currentIndex]}
              alt={`Image ${currentIndex + 1}`}
              className="img-fluid mb-3"
            />
            <div>
              <button
                className="btn btn-primary mr-2"
                onClick={this.goToPrevImage}
              >
                Prev
              </button>
              <button
                className="btn btn-primary mr-2"
                onClick={this.togglePlayPause}
              >
                {isPlaying ? "Stop" : "Play"}
              </button>
              <button
                className="btn btn-primary mr-2"
                onClick={this.goToNextImage}
              >
                Next
              </button>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

export default Task2
