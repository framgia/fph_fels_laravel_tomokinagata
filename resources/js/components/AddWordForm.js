import React, { Component } from 'react'
import ReactDOM from 'react-dom'

function Buttons (props) {
  return (
    <div className='row m-0 p-0'>
      <div className='col-md-6  col-xs-12 m-0 p-0' />
      <div className='col-md-6  col-xs-12 m-0 p-0'>
        <input type='hidden' name='number' value={props.number} />
        <button type='submit' className='btn btn-primary col-10 '>
          Submit
        </button>
        <p className='my-3 col-10 text-center'>
          <a onClick={props.addForm} href='#'>
            <u>Add a form</u>
          </a>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <a onClick={props.lessenForm} href='#'>
            <u>Lessen a form</u>
          </a>
        </p>
      </div>
    </div>
  )
}

function AnswerInput (props) {
  return (
    <div className='row'>
      <input
        type='text'
        className='form-control mb-4 col-10'
        maxLength='30'
        required
        name={props.numbers[props.number]}
      />
      <input
        type='radio'
        className='col-1 mt-2 ml-4'
        name={'check' + props.numbers[4] / 5}
        value={props.numbers[props.number]}
        required
      />
    </div>
  )
}

function FormList (props) {
  const formList = []
  for (let count = 1; count <= props.number; count++) {
    let number = number || 1
    let numbers = [number++, number++, number++, number++, number++]
    formList.push(<Form key={number} numbers={numbers} />)
    if (count === props.number) {
      formList.push(
        <Buttons
          key={'button'}
          addForm={props.addForm}
          lessenForm={props.lessenForm}
          number={props.number}
        />
      )
    }
  }
  return formList
}

function Form (props) {
  return (
    <div className='row m-0 p-0'>
      <div className='col-md-6 col-xs-12 mb-4 p-0'>
        <h5 className='my-4 col-10'>Word</h5>
        <input
          type='text'
          name={'word' + props.numbers[4] / 5}
          className='form-control col-10'
          maxLength='15'
          required
        />
      </div>
      
      <div className='col-md-6 col-xs-12'>
        <div className='row p-0'>
          <h5 className='my-4 col-10'>Choices</h5>
          <h5 className='my-4  col-2'>Answer</h5>
        </div>
        <AnswerInput numbers={props.numbers} number='0' />
        <AnswerInput numbers={props.numbers} number='1' />
        <AnswerInput numbers={props.numbers} number='2' />
        <AnswerInput numbers={props.numbers} number='3' />
        <AnswerInput numbers={props.numbers} number='4' />
      </div>
    </div>
  )
}

export default class AddWordForm extends Component {
  constructor () {
    super()
    this.state = {
      number: 1
    }
    this.addForm = this.addForm.bind(this)
    this.lessenForm = this.lessenForm.bind(this)
  }

  addForm () {
    const number = this.state.number
    this.setState({
      number: number + 1
    })
  }

  lessenForm () {
    const number = this.state.number
    if (number === 1) {
      return
    }

    this.setState({
      number: number - 1
    })
  }

  render () {
    return (
      <div className='m-0 p-0'>
        <FormList
          addForm={this.addForm}
          lessenForm={this.lessenForm}
          number={this.state.number}
        />
      </div>
    )
  }
}

if (document.getElementById('forms')) {
  ReactDOM.render(<AddWordForm />, document.getElementById('forms'))
}
