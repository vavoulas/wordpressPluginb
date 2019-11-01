/* eslint-disable no-console */
/* eslint-disable no-undef */
import React, { Component } from 'react'
//import fetchWP from '../utils/fetchWP'
import fetchAxios from '../utils/FetchAxios'
import PropTypes from 'prop-types'



//import  '../../assets/css/bootstrap.min.css'



export default class Rendering extends Component {
  constructor (props) {
    super(props)
    this.state = {
      users: [],

      isShowing: false
    }
    this.fetchAxios = new fetchAxios({
      restURL: this.props.wpObject.api_url,
      restNonce: this.props.wpObject.api_nonce
    })
  }
  componentDidMount () {
    this.fetchAxios.get('wp_contacts').then(json => {
      console.log(json);
      
      /* this.setState({
        users: response.value
      }) */
      // eslint-disable-next-line no-undef
      // eslint-disable-next-line no-console
      // eslint-disable-next-line no-undef
      // eslint-disable-next-line no-console
      
    })
  

  }

  openModalHandler = id => {
    this.setState({
      isShowing: true,
      users: [...this.state.users.filter(user => user.id === id)]
    })
  }

  closeModalHandler = () => {
    this.setState({
      isShowing: false,
      users: []
    })
    this.fetchWP.get('collection').then(json => {
      this.setState({
        users: json.value
      })
      
    })
  }

  render () {
    const chooseStyle = {
      cursor: 'pointer',
      backgroundColor: '#ffe',
      border: '1px solid #c2c2c2'
    }

   

    // eslint-disable-next-line no-unused-expressions
    const display = {
      display: 'block'
    }
    const hide = {
      display: 'none'
    }

    return (
      <div className='container'>
        <ul className='list-group text-center'>
          {this.state.users.map(user => (
            <li
              key={user.id}
              className='list-group-item d-flex flex-column justify-content-between '>
              <h3>
                Name:
                <span
                  style={chooseStyle}
                  className='text-success'
                  onClick={this.openModalHandler.bind(this, user.id)}>
                  {' '}
                  {user.name}
                </span>
              </h3>
              <h4 className='text-center'>
                Username:<span> {user.username}</span>
              </h4>

              <div
                className='modal'
                style={this.state.isShowing ? display : hide}>
                <div className='modal-dialog' role='document'>
                  <div className='modal-content'>
                    <div className='modal-header'>
                      <h1 className='modal-title'>{user.name}</h1>

                      <button
                        onClick={this.closeModalHandler}
                        type='button'
                        className='close'
                        data-dismiss='modal'
                        aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                    <div className='modal-body'>
                      <h4>Phone number: {user.phone}</h4>
                      <span>{user.website}</span>
                    </div>
                    <div className='modal-footer'>
                      <button
                        onClick={this.closeModalHandler}
                        type='button'
                        className='btn btn-secondary'
                        data-dismiss='modal'>
                        Close
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <br />
            </li>
          ))}
        </ul>
      </div>
    )
  }
}

Rendering.propTypes = {
  wpObject: PropTypes.object
}
