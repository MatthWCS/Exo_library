export const Input = ({inputName, inputType, labelText, inputComplete}) => {
    return (
        <>
            <label htmlFor={inputName}>
                {labelText}
            </label>
            <input id={inputName} name={inputName} type={inputType} autoComplete={inputComplete}/>
        </>
    )
}