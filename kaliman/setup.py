from setuptools import setup

setup(
    name='kaliman',
    version='1.0.0',
    description='Kurulu Kali Linux ortamını başlatan küçük bir Termux aracı',
    author='SeninAdın',
    author_email='sen@example.com',
    packages=['termux_kali_launcher'],
    entry_points={
        'console_scripts': [
            'termux-kali = termux_kali_launcher.__main__:main'
        ]
    },
)
