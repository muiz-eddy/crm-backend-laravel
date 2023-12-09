import { useState, useEffect } from 'react'
const TypeWriter = ({text,speed, className}) => {
    const displayText = useTypewriter(text,speed);
    return <h1 className = {className}>{displayText}</h1>;
};
export default TypeWriter;

const useTypewriter = (text, speed = 50) => {
    const [displayText, setDisplayText] = useState('');
    const [index, setIndex] = useState(0);

    useEffect(() => {
        // Function to handle the typing effect
        const typeCharacter = () => {
            if (index < text.length) {
                setDisplayText((prev) => prev + text.charAt(index));
                setIndex((prevIndex) => prevIndex + 1);
            }
        };

        // Setting a timeout to type each character
        const timeoutId = setTimeout(typeCharacter, speed);

        // Clear the timeout on cleanup
        return () => clearTimeout(timeoutId);
    }, [text, speed, index]);

    return displayText;
};


//why setinterval doesn't work and why set timeout work, need to research.

